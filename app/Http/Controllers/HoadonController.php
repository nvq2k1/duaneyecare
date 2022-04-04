<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoadon;
use App\Models\hdct;
class HoadonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoadon=hoadon::all();
        return view('admin.hoadon.ds_hoadon',['donhang'=>$hoadon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function xemchitiet_dh($id)
    {
        $donhang_ct=hdct::where('ma_hd',$id)->get();
        return view('admin.hoadon.hoadon_ct',['donhang_ct'=>$donhang_ct,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function duyetdon_modal($id)
    {
        return view('admin.hoadon.modal_duyet',['id'=>$id]);
    }
    public function duyetdon_db($id)
    {   
        hoadon::find($id)->update([
            'trang_thai' => 1,
            'trang_thai_tt' => 1, 
        ]);
        return redirect()->route('ds_hoadon')->with('success','Duyệt hóa đơn thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
