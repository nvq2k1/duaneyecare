<?php

namespace App\Http\Controllers;
use App\Cart;
use Session;
use Auth;
use App\Models\sanpham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_cart(Request $req, $id){
        
        $product=sanpham::find($id);

        if($product != null){
                
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart =new Cart($oldCart);
                $newCart->Addcart($product ,$id);

                $req->session()->put('Cart',$newCart);
                //dd(Session('Cart'));

        }
        return view('cart.view_cart');
        
    }
    public function add_carts(Request $req, $id ,$quanty){
        
        $product=sanpham::find($id);

        if($product != null){
                
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart =new Cart($oldCart);
                $newCart->Addcarts($product ,$id,$quanty);

                $req->session()->put('Cart',$newCart);
                //dd(Session('Cart'));

        }
        return view('cart.view_cart');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function xem_cart()
    {
        return view('cart.cart');
    }
    public function save_cart(Request $req ,$id ,$quanty)
    {
        
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart =new Cart($oldCart);
        $newCart->Updatecart($id ,$quanty);
        $req->session()->put('Cart',$newCart);
        return view('cart.boxcart');
    }
    public function delete_cart(Request $req, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart =new Cart($oldCart);
        $newCart->DeleteCart($id);
        if(Count($newCart->products)>0){
            $req->Session()->put('Cart',$newCart);
        }else{
            $req->Session()->forget('Cart');
        }

        return view('cart.view_cart');

    }

    public function delete_cart1(Request $req, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart =new Cart($oldCart);
        $newCart->DeleteCart($id);
        if(Count($newCart->products)>0){
            $req->Session()->put('Cart',$newCart);
        }else{
            $req->Session()->forget('Cart');
        }

        //return view('cart.view_cart');
        return redirect()->route('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {   if(Auth::guard('thanhvien')->check()){
        return view('cart.checkout');
        }
        else{
            return redirect()->route('dangnhap')->with('error','Đăng nhập để đặt hàng!');
        }
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
