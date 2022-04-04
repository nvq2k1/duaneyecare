<?php

namespace App\Http\Controllers;

use App\Models\Tintuc;
use App\Models\thanhvien;
use App\Models\binhluan;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class TintucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $list_tin=Tintuc::with('admin')->orderBy('ngay_dang','desc')->get();
        //dd($list_tin);
        return view('admin.tintuc.ds_tin',['list_tin'=>$list_tin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function them_tin()
    {   
        return view('admin.tintuc.them_tin');
    }
    public function them_tin_db(Request $req)
    {   
        $mes_err=[
            //tieude
            'tieu_de.required'=>'Tiêu đề không được để trống !',
            'tieu_de.max'=>'Tiêu đề không được quá 255 kí tự !',
            'tieu_de.min'=>'Tiêu đề phải từ 6 kí tự trở lên !',
            
            //noidung
            'noi_dung.required'=>'Nội dung bài viết không được để trống !',
            'mo_ta_ngan.required'=>'Mô tả ngắn không được để trống !',
            //hinhanh
            'hinh_anh.required'=>'Bắt buộc chọn ảnh !',
            'anhien.required'=>'Bạn phải chọn trạng thái',
            //ten_sp
           
            

            
        ];
        $validated = $req->validate([
            'tieu_de' => 'required|max:255|min:6',
            'noi_dung' => 'required',
            'mo_ta_ngan' => 'required',
            'hinh_anh' => 'required',
            'anhien' => 'required',

        ],$mes_err);
        //dd($req->all());
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
        $date=$currentTime->toDateTimeString();
        $hinh_anh=$req->file('hinh_anh');
        $file_name_avt = $hinh_anh-> getClientOriginalName();
        $hinh_anh->move(base_path('public/uploads'),$file_name_avt);
        Tintuc::create([
            'tieu_de' => $req->tieu_de,
            'noi_dung' => $req->noi_dung,
            'mo_ta' => $req->mo_ta_ngan,
            'hinh_anh' => $file_name_avt,
            'luot_xem' => 0,
            'ngay_dang' => $date,
            'nguoi_dang'=>Auth::guard('admin')->user()->ma_qt,
            'anhien' => $req->anhien,
        ]);
        return redirect()->route('tin_tuc')->with('success','Thêm bài viết thành công!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sua_tin($id)
    {
        $tin=Tintuc::find($id);
        return view('admin.tintuc.sua_tin',['tin'=>$tin]);
    }
    public function sua_tin_db(Request $req ,$id)
    {
        $hinh_anh=$req->file('hinh_anh');
        if($hinh_anh){
            $file_name_hinh_anh = $hinh_anh-> getClientOriginalName();
            $hinh_anh->move(base_path('public/uploads'),$file_name_hinh_anh);
        }else{
            $tin=Tintuc::find($id);
            $file_name_hinh_anh=$tin->hinh_anh;
        }
        Tintuc::find($id)->update([
            'tieu_de' => $req->tieu_de,
            'mo_ta' => $req->mo_ta_ngan,
            'noi_dung' => $req->noi_dung,
            'hinh_anh' => $file_name_hinh_anh,
            'anhien' => $req->anhien,
        ]);
        return redirect()->route('tin_tuc')->with('success','Cập nhật bài viết thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tintuc  $tintuc
     * @return \Illuminate\Http\Response
     */
    public function xoa_tin_modal($id)
    {
        $tin=Tintuc::find($id);
        return view('admin.tintuc.modal_xoa',['tin'=>$tin,'id'=>$id]);
    }
    public function xoa_tin($id)
    {
        Tintuc::destroy($id);
        return redirect()->route('tin_tuc')->with('success','Xóa bài viết thành công!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tintuc  $tintuc
     * @return \Illuminate\Http\Response
     */
    public function xemtin($id)
    {   
        //$tin=Tintuc::find($id)->binhluan();
        $binhluan_ganday = binhluan::orderBy('ngay_bl', 'desc')->where('ma_sp')->limit(4)->get();
        $tin_all=Tintuc::all();
        $tin=Tintuc::with('binhluan')->with('admin')->find($id);
        $null=null;
        $bl=binhluan::with('thanhvien')->where('ma_tt',$id)->where('anhien',1)->get();
        //$null=null;
        $tin_gan_day=Tintuc::where('anhien',1)->limit(4)->get();
        //dd($bl);
        return view('nguoidung.tintuc.post_detail',['tin'=>$tin,'tin_gan_day'=>$tin_gan_day,'bl'=>$bl,'binhluan_ganday'=>$binhluan_ganday,'tin_all'=>$tin_all]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tintuc  $tintuc
     * @return \Illuminate\Http\Response
     */
    public function binhluan(Request $request, Tintuc $tintuc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tintuc  $tintuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tintuc $tintuc)
    {
        //
    }
}
