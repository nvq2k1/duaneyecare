<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voucher;
use Carbon\Carbon;
class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
        $date=$currentTime->toDateTimeString();
        $ds_voucher=voucher::all();
        return view('admin.voucher.ds_voucher',['ds_voucher'=>$ds_voucher,'date'=>$date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function them_voucher(Request $req)
    {   
        $mes_err=[
            //ten_gg
            'ten_gg.required'=>'Mã giảm giá không được để trống !',
            'ten_gg.max'=>'Mã giảm giá không được quá 25 kí tự !',
            'tieu_de.min'=>'Mã giảm giá phải từ 3 kí tự trở lên !',
            
            //so_luong
            'so_luong.required'=>'Số lượng lượt dùng không được để trống !',
            'so_luong.numeric'=>'Số lượng lượt dùng phải là số !',
            //gia tri
            //so_luong
            'gia_tri.required'=>'Giá trị không được để trống !',
            'gia_tri.numeric'=>'Giá trị phải là số !',
            //ngay
            'ngay_tao.required'=>'Ngày bắt đầu không được để trống !',
            'ngay_het_han.required'=>'Ngày kết thúc không được để trống ',
            
           
            

            
        ];
        $validated = $req->validate([
            'ten_gg' => 'required|max:25|min:3',
            'so_luong' => 'required|numeric',
            'gia_tri' => 'required|numeric',
            'ngay_tao' => 'required',
            'ngay_het_han' => 'required',

        ],$mes_err);
        voucher::create([
            'ten_gg' => $req->ten_gg,
            'so_luong' => $req->so_luong,
            'gia_tri' => $req->gia_tri,
            'ngay_tao' => $req->ngay_tao,
            'ngay_het_han' => $req->ngay_het_han,
            
        ]);
        return redirect()->route('ds_voucher')->with('success','Thêm bài mã giảm giá thành công!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sua_voucher_modal($id)
    {
        $voucher=voucher::find($id);
        return view('admin.voucher.modal_sua',['voucher'=>$voucher]);
    }
    public function sua_voucher_db(Request  $req ,$id)
    {   
        $mes_err=[
            //ten_gg
            'ten_gg.required'=>'Mã giảm giá không được để trống !',
            'ten_gg.max'=>'Mã giảm giá không được quá 25 kí tự !',
            'tieu_de.min'=>'Mã giảm giá phải từ 3 kí tự trở lên !',
            
            //so_luong
            'so_luong.required'=>'Số lượng lượt dùng không được để trống !',
            'so_luong.numeric'=>'Số lượng lượt dùng phải là số !',
            //gia tri
            //so_luong
            'gia_tri.required'=>'Giá trị không được để trống !',
            'gia_tri.numeric'=>'Giá trị phải là số !',
            //ngay
            'ngay_tao.required'=>'Ngày bắt đầu không được để trống !',
            'ngay_het_han.required'=>'Ngày kết thúc không được để trống ',
            
           
            

            
        ];
        $validated = $req->validate([
            'ten_gg' => 'required|max:25|min:3',
            'so_luong' => 'required|numeric',
            'gia_tri' => 'required|numeric',
            'ngay_tao' => 'required',
            'ngay_het_han' => 'required',

        ],$mes_err);
        voucher::find($id)->update([
            'ten_gg' => $req->ten_gg,
            'so_luong' => $req->so_luong,
            'gia_tri' => $req->gia_tri,
            'ngay_tao' => $req->ngay_tao,
            'ngay_het_han' => $req->ngay_het_han,
            
        ]);
        return redirect()->route('ds_voucher')->with('success','Cập nhật mã giảm giá thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function xoa_voucher_modal($id)
    {   
        $voucher=voucher::find($id);
        return view('admin.voucher.modal_xoa',['voucher'=>$voucher]);
    }

    public function xoa_voucher($id)
    {
        voucher::destroy($id);
        return redirect()->route('ds_voucher')->with('success','Xóa mã giảm giá thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
