<style>
    li.active-menu>a{
        color: #e62e04;
    }
</style>
<div class="header-bottom header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div
                class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block"
            >
                <span class="categorie-title">Danh mục sản phẩm</span>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12">
                <nav class="d-none d-lg-block">
                    @php
                        $url=url()->full();
                        $url_goc='http://duan.test';
                    @endphp
                    <ul class="header-bottom-list d-flex">

                        <li @if($url==$url_goc) class="active-menu"  @endif >
                            <a href="/">Trang chủ</a>
                        </li>
                        <li @if($url==$url_goc.'/san-pham') class="active-menu"  @endif>
                            <a href="/san-pham">Sản phẩm</a>
                        </li>
                        <li @if($url==$url_goc.'/tin-tuc') class="active-menu"  @endif>
                            <a href="/tin-tuc">Tin tức</a>
                        </li >
                        <li @if($url==$url_goc.'/gioi-thieu') class="active-menu"  @endif>
                            <a href="/gioi-thieu">Giới thiệu</a></li>
                        <li @if($url==$url_goc.'/lien-he') class="active-menu"  @endif>
                            <a href="/lien-he">Liên hệ</a></li>
                    </ul>
                </nav>
                <div class="mobile-menu d-block d-lg-none">
                    <nav>
                        <ul>
                            <li>
                                <a href="index.html">Trang chủ</a>
                                <!-- Home Version Dropdown Start -->
                                <ul>
                                    <li><a href="index.html">Home Version 1</a></li>
                                    <li><a href="index-2.html">Home Version 2</a></li>
                                    <li><a href="index-3.html">Home Version 3</a></li>
                                    <li><a href="index-4.html">Home Version 4</a></li>
                                </ul>
                                <!-- Home Version Dropdown End -->
                            </li>
                            <li>
                                <a href="shop.html">Sản phẩm</a>
                                <!-- Mobile Menu Dropdown Start -->
                                <ul>
                                    <li><a href="product.html">product details</a></li>
                                    <li><a href="compare.html">compare</a></li>
                                    <li><a href="cart.html">cart</a></li>
                                    <li><a href="checkout.html">checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                                <!-- Mobile Menu Dropdown End -->
                            </li>
                            <li>
                                <a href="blog.html">Tin tức</a>
                                <!-- Mobile Menu Dropdown Start -->
                                <ul>
                                    <li><a href="single-blog.html">blog details</a></li>
                                </ul>
                                <!-- Mobile Menu Dropdown End -->
                            </li>
                            <li>
                                <a href="#">pages</a>
                                <!-- Mobile Menu Dropdown Start -->
                                <ul>
                                    <li><a href="register.html">register</a></li>
                                    <li><a href="login.html">sign in</a></li>
                                    <li>
                                        <a href="forgot-password.html">forgot password</a>
                                    </li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                                <!-- Mobile Menu Dropdown End -->
                            </li>
                            <li><a href="about.html">Giới thiệu</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
{{-- <script src="js\vendor\jquery-3.2.1.min.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
        $(".header-bottom-list > li").click(function(){
            $(this).addClass("active").siblings().removeClass("active")
        })
        // $(".header-bottom-list > li").eq(0).addClass("active")
    });
</script> --}}