<?php

namespace App\Http\Controllers;
use App\Models\sanpham;
use App\Models\binhluan;
use App\Models\loaisp;
use App\Models\banner;
use App\Models\Tintuc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $sp_hotdeal = DB::table('san_pham')->select()
        //     ->join('ds_anh', 'san_pham.ma_sp', '=', 'ds_anh.ma_sp')
        //     ->get();
        //$sp_hotdeal=sanpham::all();
        $sp_hotdeal = sanpham::with('ds_anh')->get();
        //dd($sp_hotdeal);
        $loai_sp=loaisp::all();
        foreach ($sp_hotdeal as $key => $sphotdeal) {
           $list_anh_sp = $sphotdeal->ds_anh->first();
            $list_anh_sp->anh;
        }
        // dd($sp_hotdeal);
        // $ds_anh=$sp_hotdeal->ds_anh;
        // dd($ds_anh);
        $ma_loai = DB::table('loai_sp')->min('ma_loai');

        //banner
        $banner=banner::all();
        //$sp_loai_first = DB::table('san_pham')->where('ma_loai',$ma_loai)->get();
        $sp_loai_first=sanpham::where('ma_loai',$ma_loai)->with('ds_anh')->get();

        //tin tuc
        $list_tin=Tintuc::where('anhien',1)->limit(4)->get();
        //foreach ($list_tin as $key => $value) {
           // $dt = new Carbon( $value->ngay_dang);
        //}
        

        return view('nguoidung.index',['sp_hotdeal'=>$sp_hotdeal,'loai_sp'=>$loai_sp,'sp_fisrt'=>$sp_loai_first,'banner'=>$banner,'list_tin'=>$list_tin]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function xemsanpham($id)
    {
        $sp_hotdeal = sanpham::with('ds_anh')->get();
        $sanpham=sanpham::find($id);
        $bl=binhluan::with('thanhvien')->where('ma_sp',$id)->where('anhien',1)->get();
        $ds_anh = DB::table('ds_anh')->where('ma_sp',$id)->get();
        return view('nguoidung.product_detail',['sp'=>$sanpham,'ds_anh'=>$ds_anh,'sp_hotdeal'=>$sp_hotdeal,'bl'=>$bl]);
    }
    public function loaisanpham($id)
    {
        //
        //$sanpham=sanpham::find(28);
        //$sp_loai = DB::table('san_pham')->where('ma_loai',$id)->get();
        $sp_loai=sanpham::where('ma_loai',$id)->with('ds_anh')->get();
        //dd($sp_loai);
        
        return view('nguoidung.content_index.content_tab_cate',['sp'=>$sp_loai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lienhe()
    {
        return view('nguoidung.contact');
    }
    public function maillienhe(Request $req)
    {   
        $mes_err=[
            //required
            'hoten.required'=>'Họ tên không được để trống !',
            'email.required'=>'Email không được bỏ trống !',
            'tieude.required'=>'Tiêu đề không được bỏ trống !',
            'noidung.required'=>'Nội dung không được bỏ trống !',
            'sdt.required'=>'Số điện thoại không được bỏ trống !',

            //numberic
            'sdt.numeric'=>'Số điện thoại phải là số !',
            'sdt.min'=>'Số điện thoại phải 10 số !',
            'sdt.max'=>'Số điện thoại phải 10 số !',


   
        ];
        $validated = $req->validate([
            'hoten' => 'required',
            'email' => 'required',
            'sdt' => 'required|numeric',
            'tieude' => 'required',
            'noidung' => 'required',
            
            
            
            
        ],$mes_err);
        //dd($req->all());
        $email=$req->email;
        //$url= url()->current();

        
        $data=['hoten'=>$req->hoten,'email'=>$req->email,'sdt'=>$req->sdt,'tieude'=>$req->tieude,'noidung'=>$req->noidung];
        Mail::send('email.mailcontact',['data'=>$data,],function($message) use ($email){
            
            $message->from('quocnguyenfpt01@gmail.com',"Mắt kính EyeCare");
            $message->to('locvdps12679@fpt.edu.vn')->subject("Thông báo Contact khách hàng");
        });
        
        return redirect()->route('lienhe')->with('success','Gửi email liên hệ thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gioithieu()
    {
        return view('nguoidung.about');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tintuc()
    {   
        $list_tin=Tintuc::where('anhien',1)->orderBy('ngay_dang','desc')->paginate(6);
        $list_tin_full=Tintuc::where('anhien',1)->get();
        return view('nguoidung.tintuc.tintuc',['list_tin'=>$list_tin,'list_tin_full'=>$list_tin_full]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function timkiem(Request $req )
    {
        //dd($req->text_timkiem);
        $data_sp = sanpham::where('ten_sp', 'like', '%' . $req->text_timkiem . '%')->get();
        $data_tt = tintuc::where('tieu_de', 'like', '%' . $req->text_timkiem . '%')->get();
        return view('nguoidung.timkiem.kq_timkiem',['sanpham'=>$data_sp,'tukhoa'=>$req->text_timkiem,'tintuc'=>$data_tt]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function support()
    {
        return view('nguoidung.support');
    }
}
