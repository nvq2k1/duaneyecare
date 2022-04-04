
@if(Session::has('Cart') != null)

@foreach(Session::get('Cart')->products as $cart) 
    <div class="single-cart-box">
        <div class="cart-img">
            <a href="{{url('/')}}/chi-tiet-san-pham/{{$cart['productInfo']->ma_sp}}"><img src="{{url('/')}}/uploads/{{$cart['productInfo']->anh_sp}}" alt="cart-image"></a>
                <span class="pro-quantity">{{$cart['quanty']}}X</span>
        </div>
        <div class="cart-content">
            <h6><a href="{{url('/')}}/chi-tiet-san-pham/{{$cart['productInfo']->ma_sp}}">{{$cart['productInfo']->ten_sp}} </a></h6>
                <span class="cart-price">{{number_format($cart['price'])}}đ</span>
                
        </div>
        <a class="del-icone"onclick="delete_cart({{$cart['productInfo']->ma_sp}})" href="javascript:"><i class="ion-close"></i></a>
    </div>
@endforeach
    <?php 
        $tongiatri= Session::get('Cart')->totalPrice;
        $vat=Session::get('Cart')->totalPrice*0.1;
        $total=$tongiatri+$vat;
    ?>
    <div class="cart-footer">
        <ul class="price-content">
            <input type="hidden" id="soluong" value="{{Session::get('Cart')->totalQuanty}}">
            <li> Tổng giá trị <span> {{number_format($tongiatri)}}đ</span></li>
            <li>VAT 10% <span>{{number_format($vat)}}đ</span></li>
            <li>Thành tiền <span>{{number_format($total)}}đ</span></li>
        </ul>
         <div class="cart-actions text-center">
             <a class="cart-checkout" href="/check-out">Thanh toán</a>
         </div>
     </div>
@endif