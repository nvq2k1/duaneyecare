<?php
namespace App;

class Cart{
    public $products= null;
    public $totalPrice=0;
    public $totalQuanty=0;

    public function __construct($cart){
        if($cart){
            
            $this->products=$cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;
        }
    }

    public function Addcart($product ,$id){
        if(($product->giamoi_sp)==null){
            $price=$product->giacu_sp;
            
        }else{
            $price=$product->giamoi_sp;
            
        }
        $newProduct =['quanty'=>0 , 'price'=>$price ,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id ,$this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price']=$newProduct['quanty'] * $price;
        $this->products[$id]=$newProduct;
        $this->totalPrice +=$price;
        $this->totalQuanty++;
    }
    public function Addcarts($product ,$id,$quanty){
        if(($product->giamoi_sp)==null){
            $price=$product->giacu_sp;
            
        }else{
            $price=$product->giamoi_sp;
            
        }
        $newProduct =['quanty'=>0 , 'price'=>$price ,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id ,$this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']=$newProduct['quanty']+$quanty;
        $newProduct['price']=$newProduct['quanty'] * $price;
        $this->products[$id]=$newProduct;
        $this->totalPrice += $quanty * $price;
        $this->totalQuanty +=$quanty;
    }

    public function DeleteCart($id){
        $this->totalPrice -=$this->products[$id]['price'];
        $this->totalQuanty -=$this->products[$id]['quanty'];
        unset($this->products[$id]);
        if($this->products==null){
            $this->totalQuanty=0;
        }
    }
    public function UpdateCart($id,$quanty){
        if(($this->products[$id]['productInfo']->giamoi_sp)==null){
            $price=$this->products[$id]['productInfo']->giacu_sp;
            
        }else{
            $price=$this->products[$id]['productInfo']->giamoi_sp;
            
        }
        //xoa so luong va gia cua san pham thay doi
        $this->totalQuanty -=$this->products[$id]['quanty'];
        $this->totalPrice -=$this->products[$id]['price'] ;
        // cap nhat lai so luong va gia
        $this->products[$id]['quanty']=$quanty;
        $this->products[$id]['price']=$quanty * $price;
        //cap nhat lai gio hang
        $this->totalQuanty +=$this->products[$id]['quanty'];
        $this->totalPrice +=$this->products[$id]['price'] ;

    }
}
?>