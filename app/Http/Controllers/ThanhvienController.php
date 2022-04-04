<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoadon;
use App\Models\thanhvien;
use Carbon\Carbon;
class ThanhvienController extends Controller
{
    
    public function index()
    {
        $list_tv=thanhvien::all();
        return view('admin.thanhvien.ds_thanhvien',['list_tv'=>$list_tv]);
    }
    public function xem_tv($id)
    {
        $tv=thanhvien::find($id);
        $sl_dh=count(hoadon::where('ma_tv',$id)->get());
        return view('admin.thanhvien.modal_xem',['tv'=>$tv,'sl_dh'=>$sl_dh]);
    }
    public function khoa_tv_modal($id)
    {
        $tv=thanhvien::find($id);
        return view('admin.thanhvien.modal_khoa',['tv'=>$tv]);
    }
    public function khoa_mo_tv($id)
    {
        $tv=thanhvien::find($id);
        if($tv->trang_thai==1){
            thanhvien::find($id)->update([
                'trang_thai' => 0   
            ]);
        }else{
            thanhvien::find($id)->update([
                'trang_thai' => 1   
            ]);
        }
        return redirect()->route('ds_tv')->with('success','Cập nhật thành viên thành công!');
    }
}
