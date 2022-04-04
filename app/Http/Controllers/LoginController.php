<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\hoadon;
use App\Models\hdct;
use Illuminate\Http\Request;
use App\Models\thanhvien;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dangnhap()
    {
        return view('nguoidung.login.dangnhap');
    }
    public function dangnhap_db(Request $req)
    {   
        $user=$req->email;
        $pass=$req->mat_khau;
       //dd((Auth::attempt(['email'=>$user,'password'=>$pass])));
       if((Auth::guard('thanhvien')->attempt(['email'=>$user,'password'=>$pass]))){
           //echo('ddang nhap thanh cong');
           //dd(Auth::guard('thanhvien')->user()->email);
           return redirect()->route('home');
       }else
       return redirect()->route('dangnhap')->with('error','Đăng nhập thất bại!');
       
    }
    public function dangky()
    {
        return view('nguoidung.login.dangky');
    }
    public function dangky_db(Request $req)
    {   
        $check_email=thanhvien::where('email',$req->email)->get();
        if($check_email == null){
            //dd($req->all());
            thanhvien::create([
            'tai_khoan'=>$req->email,
            'email'=>$req->email,
            'password'=>bcrypt($req->mat_khau),
            'sodienthoai'=>$req->sdt,
            'ten_tv'=>$req->ten_tv,
            'trang_thai'=>0,
            ]);
            return redirect()->route('dangnhap')->with('success','Đăng ký thành công !');
        }
        return redirect()->route('dangky')->with('error','Email này đã tồn tại. Vui lòng nhập email khác !');
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function xemdonhang()
    {   if(Auth::guard('thanhvien')->check()){
        $donhang=hoadon::where('ma_tv',Auth::guard('thanhvien')->user()->ma_tv)->get();
        //dd($donhang);
        return view('nguoidung.user.xemdonhang',['donhang'=>$donhang]);
        }else{
            return redirect()->route('dangnhap')->with('success','Đăng nhập để xem đơn hàng !');
        }
    }
    public function xemdonhang_ct($id)
    {   if(Auth::guard('thanhvien')->check()){
        $donhang_ct=hdct::where('ma_hd',$id)->get();
        //dd($donhang_ct);
        return view('nguoidung.user.xemdonhang_ct',['donhang_ct'=>$donhang_ct,'id'=>$id]);
        }else{
            return redirect()->route('dangnhap')->with('success','Đăng nhập để xem đơn hàng !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dangxuat()
    {
        Auth::guard('thanhvien')->logout();
        return redirect()->route('dangnhap')->with('error','Đăng xuất thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function capnhat_tt()
    {
        return view('nguoidung.user.capnhat_tt');
    }
    public function capnhat_tt_db(Request $req)
    {   
        //dd($req->all());
        $id=$req->ma_tv;
        $avt=$req->file('avt');
        if($avt){
            $file_name_avt = $avt-> getClientOriginalName();
            $avt->move(base_path('public/uploads'),$file_name_avt);
            
        }else{
            $thanhvien=thanhvien::find($id);
            if($thanhvien->anh_dai_dien == null){
            
            $file_name_avt='';
            }else{
                $file_name_avt=$thanhvien->anh_dai_dien;
            }
        }
        thanhvien::find($id)->update([
            'ten_tv' => $req->ten_tv,
            'sodienthoai' => $req->sdt,
            'diachi' => $req->dia_chi,
            'anh_dai_dien' => $file_name_avt,
            
        ]);
        return redirect()->route('taikhoan')->with('success','Cập nhật thông tin thành công !');
        //return view('nguoidung.user.capnhat_tt');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doimatkhau()
    {   
        return view('nguoidung.user.doimatkhau');
    }
    public function doimatkhau_db(Request  $req)
    {   
        //dd($req->all());
        //$password_old=bcrypt($req->password_old);
        //$pass_old=thanhvien::find($req->ma_tv)->password;
        //dd($password_old);
        if(Hash::check($req->password_old, Auth::guard('thanhvien')->user()->password)){
            thanhvien::find($req->ma_tv)->update([
                'password' => bcrypt($req->password_new), 
            ]);
            return redirect()->route('home')->with('success','Đổi mật khẩu thành công !');
        }else return redirect()->route('doimatkhau')->with('error','Mật khẩu cũ không chính xác !');
        
        //return view('nguoidung.user.doimatkhau');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quenmatkhau()
    {
        return view('nguoidung.user.quenmatkhau');
    }
    public function xacnhan_email(Request  $req)
    {   
        
        $taikhoan=thanhvien::where('email',$req->email)->first();
        if($taikhoan !=null){
            $email=$req->email;
            $code=mt_rand(100000, 999999);
            thanhvien::find($taikhoan->ma_tv)->update([
                'password' => bcrypt($code), 
            ]);
            $data=['hoten'=>$taikhoan->ten_tv,'email'=>$email,'code'=>$code];
            Mail::send('email.email_quenmatkhau',['data'=>$data],function($message) use ($email){
            $message->from('quocnguyenfpt01@gmail.com',"Mắt kính EyeCare");
            $message->to($email)->subject("Yêu cầu khôi phục mật khẩu");
        });
        return redirect()->route('dangnhap')->with('success','Khôi phục mật khẩu thành công vui lòng xem mật khẩu trong Email !');
        }
        return redirect()->route('quenmatkhau')->with('error','Email không tồn tại. Vui lòng kiểm tra lại !');
        //return view('nguoidung.user.quenmatkhau');
    }
}
