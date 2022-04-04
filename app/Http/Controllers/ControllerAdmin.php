<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\loaisp;
class ControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::guard('admin')->check()){
            return view('admin.index');
        }else{
            return redirect()->route('login_ad')->with('error','Yêu cầu đăng nhập !');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loaisp()
    {   
        if(Auth::guard('admin')->user()->phan_quyen==1){
            $list_loaisp=loaisp::all();
            return view('admin.loaisp.ds_loaisp')->with(['list_loaisp'=>$list_loaisp]);
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
    public function login_ad()
    {
        return view('admin.login.login');
    }
    public function login_ad_db(Request $req)
    {   
        //dd($req->all());
        //return view('admin.login.login');
        if((Auth::guard('admin')->attempt(['tai_khoan'=>$req->tai_khoan,'password'=>$req->password]))){
            return redirect()->route('admin');
        }else{
            return redirect()->route('login_ad')->with('error','Đăng nhập thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout_ad()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_ad')->with('error','Đăng xuất thành công!');
        
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
