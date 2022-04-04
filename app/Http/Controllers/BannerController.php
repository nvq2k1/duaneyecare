<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $list_banner=banner::where('trang_thai',1)->get();
            //dd($list_banner);
            return view('admin.tuybien.banner',['list_banner'=>$list_banner]);
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }
    public function sua_banner_db(Request $req)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $ds_banner=$req->file('ds_banner');
            if($ds_banner){
                //$xoa_anh=DB::table('tuy_bien_banner')->delete();
                $list_banner_active=banner::where('trang_thai',1)->get();
                foreach($list_banner_active as $b){
                    banner::find($b->id)->update([
                        'trang_thai' => 0,
                           
                    ]);
                }
                foreach($ds_banner as $file){
                    $file_name = $file-> getClientOriginalName();
                    $file->move(base_path('public/uploads'),$file_name);
                    banner::create([
                        
                        'anh_banner' => $file_name,
                        'trang_thai' => 1,
                        
                    ]);
                }
            return redirect()->route('banner')->with('success','Cập nhật Banner thành công!');
            
            }else{
                return redirect()->route('banner')->with('success','Đã lưu !');
            }
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thuvien_anh()
    {   
        $list_anh=banner::all();
        return view('admin.tuybien.modal_thuvien',['list_anh'=>$list_anh]);
    }
    public function chon_anh(Request $req)
    {   
        //dd($req->all());
        $list_anh=banner::all();
        foreach($list_anh as $l){
            banner::find($l->id)->update([
                'trang_thai' => 0,
                   
            ]);
        }
        foreach($req->banner as $b){
            

            banner::find($b)->update([
                'trang_thai' => 1,
                   
            ]);
        }
        return redirect()->route('banner')->with('success','Cập nhật Banner thành công!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        //
    }
}
