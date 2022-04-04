<?php

namespace App\Http\Controllers;
use App\Models\hoadon;
use App\Models\hdct;
use App\Models\sanpham;
use App\Models\voucher;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vnpay(Request $req)
    {
        //dd($req->all());
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://matkinheyecare.click/vnpay-return";
        $vnp_TmnCode = "9GYC95C2";//Mã website tại VNPAY 
        $vnp_HashSecret = "UOHEZMOEIMRJSQQHYWUOFCHOYMATJYJK"; //Chuỗi bí mật

        $vnp_TxnRef = $req->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan vnpay';
        $vnp_OrderType = 'billpay';
        $vnp_Amount = $req->amount * 100;
        $vnp_Locale = $req->language;
        $vnp_BankCode = $req->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        //$vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            //"vnp_ExpireDate"=>$vnp_ExpireDate,
           
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
           
            return redirect($vnp_Url);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vnpayReturn(Request $req)
    {
        //dd($req->toArray());
        if($req->vnp_TransactionStatus==00){
        hoadon::find($req->vnp_TxnRef)->update([
            'trang_thai_tt' => 1,
              
        ]);
        return redirect()->route('home')->with('success','Thanh toán và đặt hàng thành công !');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function xacnhan_vnpay(Request $req)
    {   
        $ma_hd=mt_rand(0, 9999);
        
        return view('vnpay.vnpay',['tongtien'=>$req->tongtien,'ma_hd'=>$ma_hd]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_after(Request $req)
    {   
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
        $date=$currentTime->toDateTimeString();
        hoadon::create([
            'ma_tv' => Auth::guard('thanhvien')->user()->ma_tv,
            'dia_chi_nhan'=>$req->dia_chi_nhan,
            'sdt_nhan'=>$req->sdt_nhan,
            'email_nhan'=>$req->email_nhan,
            'ghichu_tv'=>$req->ghichu_tv,
            'ngay_gd'=>$date,
            'tong_tien'=>$req->tongtien,
            'so_luong'=>$req->tongsoluong,
            'trang_thai'=>0,
            'trang_thai_tt'=>0,
            'anhien'=>1,
            
        ]);
        $ma_hd = DB::table('hoa_don')->max('ma_hd');
        foreach(Session::get('Cart')->products as $cart){

        
        hdct::create([
            'ma_hd' => $ma_hd,
            'ma_sp'=>$cart['productInfo']->ma_sp,
            'ten_sp'=>$cart['productInfo']->ten_sp,
            'anh_sp'=>$cart['productInfo']->anh_sp,
            'gia_sp'=>$cart['price']/$cart['quanty'],
            'tong_tien'=>$cart['price'],
            'so_luong'=>$cart['quanty'],
            
        ]);
        } 
        //xoa het
        
        $req->session()->forget('Cart');
        return redirect()->route('home')->with('success','Đặt hàng thành công !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order(Request $req)
    {   
        //dd($req->all());
        foreach(Session::get('Cart')->products as $cart){
            if($cart['productInfo']->sl_trong_kho <$cart['quanty']){
                return redirect()->route('checkout')->with('error','Sản phẩm ' . $cart['productInfo']->ten_sp. ' hiện tại chỉ còn '.$cart['productInfo']->sl_trong_kho . ' chiếc mong quý khách cập nhật lại số lượng');
            }
        }
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
        $date=$currentTime->toDateTimeString();

        $mes_err=[
            //sdt_nhan
            'sdt_nhan.required'=>'Số điện thoại không được để trống !',
            'sdt_nhan.max'=>'Số điện thoại phải là 10 số !',
            'sdt_nhan.min'=>'Số điện thoại phải là 10 số !',
            
            //dia_chi_nhan
            'dia_chi_nhan.required'=>'Địa chỉ nhận hàng không được để trống !',
            'email_nhan.required'=>'Email không được để trống !',
            
           
            

            
        ];
        $validated = $req->validate([
            'sdt_nhan' => 'required|min:9|max:10',
            'dia_chi_nhan' => 'required',
            'email_nhan' => 'required',
            

        ],$mes_err);
        hoadon::create([
            'ma_tv' => Auth::guard('thanhvien')->user()->ma_tv,
            'dia_chi_nhan'=>$req->dia_chi_nhan,
            'sdt_nhan'=>$req->sdt_nhan,
            'email_nhan'=>$req->email_nhan,
            'ghichu_tv'=>$req->ghichu_tv,
            'ngay_gd'=>$date,
            'tong_tien'=>$req->tongtien,
            'so_luong'=>$req->tongsoluong,
            'trang_thai'=>0,
            'trang_thai_tt'=>0,
            'anhien'=>1,
            
        ]);
        // giam so luong ve khuyen mai
        if($req->ma_gg){
            $voucher=voucher::find($req->ma_gg);
            voucher::find($req->ma_gg)->update([
                'so_luong' => ($voucher->so_luong)-1,
                
            ]);
        }

        $ma_hd = DB::table('hoa_don')->max('ma_hd');
        foreach(Session::get('Cart')->products as $cart){
        $soluong=$cart['productInfo']->sl_trong_kho - $cart['quanty'];
        $luotban=$cart['productInfo']->luot_ban + $cart['quanty'];
        sanpham::find($cart['productInfo']->ma_sp)->update([
            'sl_trong_kho' => $soluong,
            'luot_ban' => $luotban,
   
        ]);
        hdct::create([
            'ma_hd' => $ma_hd,
            'ma_sp'=>$cart['productInfo']->ma_sp,
            'ten_sp'=>$cart['productInfo']->ten_sp,
            'anh_sp'=>$cart['productInfo']->anh_sp,
            'gia_sp'=>$cart['price']/$cart['quanty'],
            'tong_tien'=>$cart['price'],
            'so_luong'=>$cart['quanty'],
            
        ]);
        } 
        $hoadon=hoadon::where('ma_hd',$ma_hd)->first();
        $hdct=hdct::where('ma_hd',$ma_hd)->get();
        $email=$req->email_nhan;
        $hoten=Auth::guard('thanhvien')->user()->ten_tv;
        //dd($hoten);
        $voucher=voucher::find($req->ma_gg);
        $data=['hoten'=>$hoten,'email_nhan'=>$req->email_nhan,'sdt_nhan'=>$req->sdt_nhan,'donhang_ct'=>$hdct,'hoadon'=>$hoadon,'voucher'=>$voucher];
        Mail::send('email.mail_order_success',['data'=>$data],function($message) use ($email){
            $message->from('quocnguyenfpt01@gmail.com',"Mắt kính EyeCare");
            $message->to($email)->subject("Đặt hàng thành công");
        });
        //xoa het
        $req->session()->forget('Cart');
        if($req->thanhtoan==0){
            return redirect()->route('home')->with('success','Đặt hàng thành công !');
        }else if($req->thanhtoan==1){
        
            return view('vnpay.vnpay',['tongtien'=>$req->tongtien,'ma_hd'=>$ma_hd]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function voucher(Request $req ,$ma_gg)
    {   
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
        $date=$currentTime->toDateTimeString();
        $check_voucher=voucher::where('ten_gg',$ma_gg)->first();
        if($check_voucher !=null){
            
            $time_stamp =strtotime($date);

            $time_stamp_start=strtotime($check_voucher->ngay_tao);

            $time_stamp_end=strtotime($check_voucher->ngay_het_han);
        }
        //dd($check_voucher);
        if($check_voucher==null){
            
            $mess='Mã giảm giá này không tồn tại';
            return view('cart.after_voucher_err',['mess'=>$mess]);
            
        }else if( ($check_voucher->so_luong) > 0 ){
            if($time_stamp>$time_stamp_start && $time_stamp<$time_stamp_end ){
                $mess='Áp dụng mã '.$check_voucher->ten_gg . ' thành công . Giảm giá '.$check_voucher->gia_tri.'%';
                //dd($mess);
                return view('cart.after_voucher',['voucher'=>$check_voucher,'mess'=>$mess]);
            }else{
                $mess='Mã '.$check_voucher->ten_gg . ' đã hết hạn sử dụng ';
                //dd($mess);
                return view('cart.after_voucher_err',['mess'=>$mess]);
            }
        }else{  
            $mess='Mã ' .$check_voucher->ten_gg . ' này đã hết lượt dùng';
            return view('cart.after_voucher_err',['mess'=>$mess]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
