<?php

namespace App\Http\Controllers;
use App\Models\banner;
use Auth;
use Illuminate\Http\Request;
use App\Models\loaisp;
class ControllerLoaisp extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function them_loaisp()
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            return view('admin.loaisp.them_loaisp');
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }
    public function them_loaisp_db(Request $req)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $mes_err=[
                //required
                'tenloai.required'=>'Tên loại không được để trống !',
                //max
                
                'tenloai.max'=>'Tên loại không được quá 128 kí tự !',
                'tenloai.min'=>'Tên loại từ 6 kí tự trở lên !',
    
                
            ];
            $validated = $req->validate([
                'tenloai' => 'required|max:128|min:6',
                
                
            ],$mes_err);
            loaisp::create([
                'ten_loai' => $req->tenloai,
                'anhien' => $req->anhien,
                
            ]);
            return redirect()->route('ds_loaisp')->with('success','Thêm loại thành công!');
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
    public function sua_loaisp($id)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $loaisp=loaisp::find($id);
            return view('admin.loaisp.modal_sua',['loaisp'=>$loaisp]);
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }
    public function sua_loaisp_db(Request  $req ,$id)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            loaisp::find($id)->update([
                'ten_loai' => $req->tenloai,
                'anhien' => $req->anhien, 
            ]);
            return redirect()->route('ds_loaisp')->with('success','Cập nhật loại thành công!');
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xoa_loaisp($id)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            loaisp::destroy($id);
            return redirect()->route('ds_loaisp')->with('success','Xoa loại thành công!');
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
    }
    public function xoa_loaisp_modal($id)
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            return view('admin.loaisp.modal_xoa',['id'=>$id]);
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
        
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
