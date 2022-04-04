<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use Illuminate\Pagination\Paginator;
use App\Models\loaisp;
use App\Models\ds_anh;
use Carbon\Carbon;
use App\Models\banner;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$sanpham=sanpham::all();
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $sanpham = DB::table('san_pham')->select()
            ->join('loai_sp', 'san_pham.ma_loai', '=', 'loai_sp.ma_loai')
            ->get();
            $loaisp=loaisp::all();
            return view('admin.sanpham.ds_sanpham',['loaisp'=>$loaisp,'sanpham'=>$sanpham]);
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }
    public function xoa_sp_modal($id)
    {   
        $sanpham=sanpham::find($id);
        return view('admin.sanpham.modal_xoa',['id'=>$id,'sanpham'=>$sanpham]);
    }
    public function xoa_sp($id)
    {
        sanpham::destroy($id);
        return redirect()->route('ds_sp')->with('success','Xóa sản phẩm thành công!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function them_sp(Request $req)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $mes_err=[
                //required
                'ten_sp.required'=>'Tên sản phẩm không được để trống !',
                'loai_sp.required'=>'Bắt buộc chọn loại sản phẩm !',
                'gia_cu.required'=>'Giá cũ sản phẩm không được để trống !',
                'gia_moi.required'=>'Giá mới sản phẩm không được để trống !',
                'so_luong.required'=>'Số lượng sản phẩm không được để trống !',
                'mota_sp.required'=>'Mô tả không được để trống !',
                'anh_sp.required'=>'Ảnh sản phẩm không được để trống !',
                'ds_anh.required'=>'Ảnh không được để trống !',
                //max
                //ten_sp
                'ten_sp.max'=>'Tên sản phẩm không được quá 128 kí tự !',
                'ten_sp.min'=>'Tên sản phẩm từ 6 kí tự trở lên !',
                //gia
                'giacu_sp.numeric'=>'Giá cũ sản phẩm phải là số !',
                'giamoi_sp.numeric'=>'Giá mới sản phẩm phải là số !',
                'sl_trong_kho.numeric'=>'Số lượng phải là số !',
                
    
                
            ];
            $rules = [
                'loai_sp' => 'required'
            ];
            $validated = $req->validate([
                'ten_sp' => 'required|max:100|min:6',
                'loai_sp' => 'required',
                'gia_cu' => 'required|numeric',
                
                'so_luong' => 'required|numeric',
                'mota_sp' => 'required',
                'anh_sp' => 'required',
                'ds_anh' => 'required',
                
                
                
                
            ],$mes_err);
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
            $date=$currentTime->toDateTimeString();
            $list=$req->file('ds_anh');
            $avt=$req->file('anh_sp');
            $file_name_avt = $avt-> getClientOriginalName();
            $avt->move(base_path('public/uploads'),$file_name_avt);
            $loaisp=loaisp::all();
    
            
    
            sanpham::create([
                'ten_sp' => $req->ten_sp,
                'ma_loai' => $req->loai_sp,
                'giacu_sp' => $req->gia_cu,
                'giamoi_sp' => $req->gia_moi,
                'anh_sp' => $file_name_avt,
                'sl_trong_kho' => $req->so_luong,
                'mota_sp' => $req->mota_sp,
                'thoidiemtao' => $date, 
            ]);
            if($list){
                foreach($list as $file){
    
                        $ma_sp = DB::table('san_pham')->max('ma_sp');
                        $file_name = $file-> getClientOriginalName();
                        $file->move(base_path('public/uploads'),$file_name);
                        ds_anh::create([
                            'ma_sp' => $ma_sp,
                            'anh' => $file_name,
                            
                        ]);
                        
                }
            }
            
            return redirect()->route('ds_sp')->with('success','Thêm sản phẩm thành công!');
        }else{
        return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sua_sanpham($id)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $sanpham=sanpham::find($id);
            $loaisp=loaisp::all();
            $ds_anh = DB::table('ds_anh')->where('ma_sp',$id)->get();
            return view('admin.sanpham.modal_sua',['sanpham'=>$sanpham,'loaisp'=>$loaisp,'ds_anh'=>$ds_anh]);
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function sua_sanpham_db(Request $req ,$id)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
        $list_anh=$req->file('ds_anh');
        $avt=$req->file('anh_sp');
        if($avt){
            $file_name_avt = $avt-> getClientOriginalName();
            $avt->move(base_path('public/uploads'),$file_name_avt);
        }else{
            $sanpham=sanpham::find($id);
            $file_name_avt=$sanpham->anh_sp;
        }
        if($list_anh){
            $xoa_anh=DB::table('ds_anh')->where('ma_sp',$id)->delete();;
            foreach($list_anh as $file){
                $file_name = $file-> getClientOriginalName();
                $file->move(base_path('public/uploads'),$file_name);
                ds_anh::create([
                    'ma_sp' => $id,
                    'anh' => $file_name,
                    
                ]);      
        }
        }
        sanpham::find($id)->update([
            'ten_sp' => $req->ten_sp,
            'ma_loai' => $req->loai_sp,
            'giacu_sp' => $req->gia_cu,
            'giamoi_sp' => $req->gia_moi,
            'anh_sp' => $file_name_avt,
            'sl_trong_kho' => $req->so_luong,
            'mota_sp' => $req->mota_sp,
            
        ]);
        return redirect()->route('ds_sp')->with('success','Cập nhật sản phẩm thành công!');

        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function sanpham()
    {   
        $topnew=sanpham::where('anhien',1)->orderBy('thoidiemtao', 'desc')->limit(4)->get();
        $list_loai=loaisp::where('anhien',1)->get();
        $gia_max = DB::table('san_pham')->max('giacu_sp');
        $list_sp=sanpham::where('anhien',1)->paginate(6);
        $list_sp_full=sanpham::where('anhien',1)->get();
        //dd($list_sp->links()->elements[0]);
        return view('nguoidung.sanpham.sanpham',['list_sp'=>$list_sp,'list_sp_full'=>$list_sp_full,'gia_max'=>$gia_max,'list_loai'=>$list_loai,'topnew'=>$topnew]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function loc_gia(Request $req ,$min ,$max,$tt ,$ma_loai )
    {   
        if($tt == 0){
        $gia_max = DB::table('san_pham')->max('giacu_sp');
        $list_sp=sanpham::where('anhien',1)->get();
        return view('nguoidung.sanpham.loc_gia',['min'=>$min ,'max'=>$max ,'list_sp'=>$list_sp,'gia_max'=>$gia_max]);
        }else if($tt ==1){
            $gia_max = DB::table('san_pham')->max('giacu_sp');
            $list_sp=sanpham::where('anhien',1)->get();
            return view('nguoidung.sanpham.loc_gia_danh_muc',['min'=>$min ,'max'=>$max,'list_sp'=>$list_sp,'gia_max'=>$gia_max ,'ma_loai'=>$ma_loai]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function sp_danhmuc(Request $req ,$id ,$min ,$max)
    {   
        
        $gia_max = DB::table('san_pham')->max('giacu_sp');
        $list_sp=sanpham::where('anhien',1)->where('ma_loai',$id)->get();
        //dd($list_sp);
        return view('nguoidung.sanpham.loc_gia_danh_muc',['min'=>$min ,'max'=>$max,'list_sp'=>$list_sp,'gia_max'=>$gia_max ,'ma_loai'=>$id]);
    }

    public function sp_dm($id)
    {   
        
        //$gia_max = DB::table('san_pham')->max('giacu_sp');
        $tenloai=(loaisp::find($id))->ten_loai;
        $list_sp_dm=sanpham::where('ma_loai',$id)->where('anhien',1)->paginate(6);
        //dd($list_sp_dm);
        //$url=url()->full();
        //dd($url);
         return view('nguoidung.sanpham.sanpham_danhmuc',['tenloai'=>$tenloai,'list_sp_dm'=>$list_sp_dm,'id'=>$id]);
    }
}
