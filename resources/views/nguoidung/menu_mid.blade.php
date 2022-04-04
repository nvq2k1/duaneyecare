
<div class="header-middle ptb-15">
    <div class="container">
        <div class="row align-items-center no-gutters">
            <div class="col-lg-2 col-md-2">
                <div class="logo mb-all-30 logo-header">
                    <a href="/"
                        ><img src="{{url('/')}}/img/index/logo.png" alt="logo-image" class="header-logo"
                    /></a>
                </div>
            </div>
            <!-- Categorie Search Box Start Here -->
            <div class="col-lg-6 col-md-9 ml-auto mr-auto col-10">
                <div class="categorie-search-box">
                    <form method="POST" action="/tim-kiem">
                            @csrf
                            <input type="text"  name="text_timkiem" class="form-control m-input" placeholder="Tìm kiếm...." />
                            {{-- <div class="autocom-box">
                                <a href="dsdad">sadsa</a>
                              </div> --}}
                            <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                            
                        
                       
                        
                    </form>
                </div>
            </div>
            <!-- Categorie Search Box End Here -->
            <!-- Cart Box Start Here -->
            <div class="col-lg-4 col-md-12">
                <div class="cart-box mt-all-30">
                    <ul
                        class="d-flex justify-content-lg-end justify-content-center align-items-center"
                    >
                        <li>
                            <a href="/cart" class="center flex-column"
                                ><i class="lnr lnr-cart"></i
                                ><span class="my-cart">
                                    {{-- <input type="text" 
                                    @if(Session::has('Cart'))
                                    value="1"
                                    @else
                                    value="0"
                                    @endif
                                     id="sl"> --}}
                                    @if(Session::has('Cart') != null)
                                        <span class="total-pro" id="quanty-show">{{Session::get('Cart')->totalQuanty;}}</span><span>Giỏ hàng</span>
                                    @else 
                                        <span class="total-pro" id="quanty-show">0</span><span>Giỏ hàng</span>
                                    @endif
                                </span>
                            </a>
                            <ul class="ht-dropdown cart-box-width">
                                <li>
                                    <!-- Cart Box Start -->
                                    <div id="change-item">
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
                                        <a class="del-icone" onclick="delete_cart({{$cart['productInfo']->ma_sp}})" href="javascript:"><i class="ion-close"></i></a>
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
                                        @else
                                            <p>Hiện tại chưa có sản phẩm !</p>
                                        
                                        @endif
                                       
                                </div>
                                    <!-- Cart Box End -->
                                    <!-- modal dang xuat -->
                                    <!-- Button trigger modal -->
                                        <!-- Button trigger modal -->
                                       
                                        
                                        <!-- Modal -->
                                        <!-- Button trigger modal -->
                                   
  
                                <!-- Modal -->
                                
                                    <!-- Cart Box End -->
                                    <!-- Cart Footer Inner Start -->
                                    
                                    <!-- Cart Footer Inner End -->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="center flex-column"
                                ><i class="lnr lnr-heart"></i
                                ><span class="my-cart"
                                    >Yêu thích </span
                                ></a
                            >
                        </li>
                        @if(Auth::guard('thanhvien')->check())
                            <li class="login-main">
                                <a href="#" class="center flex-column"
                                    ><i class="lnr lnr-user"></i
                                    ><span class="my-cart"><span>Xin chào <strong>{{ Auth::guard('thanhvien')->user()->ten_tv }}</strong></span></span></a
                                >
                                <ul class="login-dropdown">
                                    <li>
										<a href="/cap-nhat-thong-tin"> Cập nhật thông tin</a>
									</li>
                                    <li>
										<a href="/doi-mat-khau"> Đổi mật khẩu</a>
									</li>
									<li>
										<a href="/xem-don-hang"> Xem đơn hàng</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#logout"> Đăng xuất</a>
                                        
									</li>
								</ul>
                                
                            </li>
                        @else
                            <li class="login-main">
                                <a href="/dang-nhap" class="center flex-column"
                                    ><i class="lnr lnr-user"></i
                                    ><span class="my-cart"><span> Đăng nhập</span></span></a
                                >
								
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Cart Box End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->

</div>
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <h6>Bạn có thực sự muốn đăng xuất ?</h6>
        </div>
        <div class="modal-footer">
            
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        
        <a class="btn btn-primary" href="/dang-xuat">Đồng ý</a>
        </div>
    </div>
    </div>
    <!-- dang xuat -->
</div>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
