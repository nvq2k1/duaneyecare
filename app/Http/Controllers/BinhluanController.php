<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\binhluan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BinhluanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function binhluan_tin( $id ,$ma_tv ,$noidung)
    {
        
        //return redirect()->back();
        if(Auth::guard('thanhvien')->check()){
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
            $date=$currentTime->toDateTimeString();

            binhluan::create([
                'ma_tv' => $ma_tv,
                'ma_tt' => $id,
                'noi_dung' => $noidung,
                'anhien' => 1,
                'ngay_bl' => $date,
                
            ]);
            $bl=binhluan::with('thanhvien')->where('ma_tt',$id)->get();
    
            return view('nguoidung.tintuc.binhluan',['bl'=>$bl]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
    }

    public function binhluan_sp( $id ,$ma_tv ,$noidung)
    {
        
        //return redirect()->back();
        if(Auth::guard('thanhvien')->check()){
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
            $date=$currentTime->toDateTimeString();

            binhluan::create([
                'ma_tv' => $ma_tv,
                'ma_sp' => $id,
                'noi_dung' => $noidung,
                'anhien' => 1,
                'ngay_bl' => $date,
                
            ]);
            $bl=binhluan::with('thanhvien')->where('ma_sp',$id)->get();
    
            return view('nguoidung.sanpham.binhluan',['bl'=>$bl]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ds_binhluan()
    {   
        $list_bl=binhluan::with('thanhvien')->get();
        //dd($list_bl);
        return view('admin.binhluan.ds_binhluan',['list_bl'=>$list_bl]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function xoa_bl_modal($id)
    {   
        return view('admin.binhluan.modal_xoa',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xoa_bl_db($id)
    {
        binhluan::destroy($id);
        return redirect()->route('ds_binhluan')->with('success','Xóa bình luận thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sua_binhluan($id)
    {   if(Auth::guard('thanhvien')->check()){
            $binhluan=binhluan::find($id);
            return view('nguoidung.tintuc.input_sua',['binhluan'=>$binhluan]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
        
    }
    public function sua_binhluan_sp($id)
    {   if(Auth::guard('thanhvien')->check()){
            $binhluan=binhluan::find($id);
            return view('nguoidung.sanpham.input_sua',['binhluan'=>$binhluan]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
        
    }

    public function luu_binhluan($id ,$text,$ma_tt)
    {   
        if(Auth::guard('thanhvien')->check()){
            binhluan::find($id)->update([
                'noi_dung' => $text, 
            ]);
            $bl=binhluan::with('thanhvien')->where('ma_tt',$ma_tt)->get();
    
            return view('nguoidung.tintuc.binhluan',['bl'=>$bl]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
        
       
    }
    public function luu_binhluan_sp($id ,$text,$ma_sp)
    {   
        if(Auth::guard('thanhvien')->check()){
            binhluan::find($id)->update([
                'noi_dung' => $text, 
            ]);
            $bl=binhluan::with('thanhvien')->where('ma_sp',$ma_sp)->get();
    
            return view('nguoidung.sanpham.binhluan',['bl'=>$bl]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
        
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xoa_binhluan_modal($id)
    {   
        if(Auth::guard('thanhvien')->check()){
            $bl=binhluan::find($id);
            return view('nguoidung.tintuc.modal_xoa',['bl'=>$bl]);
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
        
    }

    public function xoa_binhluan($id)
    {   
        if(Auth::guard('thanhvien')->check()){
            binhluan::destroy($id);
            return redirect()->back();
            
        }else{
            return redirect()->route('dangnhap')->with('success','Yêu cầu đăng nhập !');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function an($id)
    {
        binhluan::find($id)->update([
            'anhien' => 0, 
        ]);
        $list_bl=binhluan::with('thanhvien')->get();
        return view('admin.binhluan.main_bl',['list_bl'=>$list_bl]);
    }
    public function hien($id)
    {
        binhluan::find($id)->update([
            'anhien' => 1, 
        ]);
        $list_bl=binhluan::with('thanhvien')->get();
        return view('admin.binhluan.main_bl',['list_bl'=>$list_bl]);
    }
}
