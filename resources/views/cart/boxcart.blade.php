<div id="change-box-cart">


@if(Session::has('Cart') != null)

<div class="table-content table-responsive mb-45">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Hình ảnh</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng tiền</th>
                                            <th class="product-remove">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Session::get('Cart')->products as $cart)    
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{url('/')}}/uploads/{{$cart['productInfo']->anh_sp}}" alt="cart-image"></a>
                                            </td>
                                            
                                            <td class="product-name"><a href="/chi-tiet-san-pham/{{$cart['productInfo']->ma_sp}}">{{$cart['productInfo']->ten_sp}}</a></td>
                                            <td class="product-price"><span class="amount">
                                                @if($cart['productInfo']->giamoi_sp)
                                                {{number_format($cart['productInfo']->giamoi_sp)}}đ
                                                @else
                                                {{number_format($cart['productInfo']->giacu_sp)}}đ
                                                @endif
                                            </span></td>
                                            {{-- <td  class="product-quantity"><input type="number" class="ok" onclick="Updatecart({{ $cart['productInfo']->ma_sp }})" id="quanty-{{ $cart['productInfo']->ma_sp }}"  value="{{$cart['quanty']}}"></td> --}}
                                            <td width="100px">
                                               
                                                <div class="input-group">
                                                    <span class="input-group-text btn btn-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown();Updatecart({{ $cart['productInfo']->ma_sp }});"> -     </span>
                                                    <input type="number"   id="quanty-{{ $cart['productInfo']->ma_sp }}"  value="{{$cart['quanty']}}" class="form-control text-center" min="1" max="100">
                                                    <span class="input-group-text btn btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp();Updatecart({{ $cart['productInfo']->ma_sp }});"> +    </span>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">{{number_format($cart['price'])}}đ</td>
                                            <td class="product-remove"> <a href="/delete_cart1/{{$cart['productInfo']->ma_sp}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                            {{-- <td class="product-remove"> <a onclick="Updatecart({{ $cart['productInfo']->ma_sp }})" href="javascript:">Save</a></td> --}}
                                        </tr>
                                    @endforeach
                                    <?php 
                                        $tongiatri= Session::get('Cart')->totalPrice;
                                        $vat=Session::get('Cart')->totalPrice*0.1;
                                        $total=$tongiatri+$vat;
                                    ?>   
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                               <!-- Cart Button Start -->
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        <a href="#">Tiếp tục mua sắm</a>
                                    </div>
                                </div>
                                <!-- Cart Button Start -->
                                <!-- Cart Totals Start -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="cart_totals float-md-right text-md-right">
                                        <h2>Tổng tiền</h2>
                                        <br>
                                        <table class="float-md-right">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Tổng giá trị</th>
                                                    <td><span class="amount">{{number_format($tongiatri)}}đ</span></td>
                                                </tr>
                                                <tr class="cart-subtotal">
                                                    <th>Phí VAT</th>
                                                    <td><span class="amount">{{number_format($vat)}}đ</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Thành tiền</th>
                                                    <td>
                                                        <strong><span class="amount">{{number_format($total)}}đ</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="/check-out">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Totals End -->
                            </div>
@else <p>Hiện tại chưa có sản phẩm nào !</p>

@endif
</div>
