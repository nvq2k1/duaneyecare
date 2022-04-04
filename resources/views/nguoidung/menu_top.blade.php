{{-- <div class="header-top-area">
    <div class="container">
        <!-- Header Top Start -->
        <div class="header-top">
            <ul>
                <li><a href="#">Free Shipping on order over $99</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
            </ul>
            <ul>
                <li>
                    <span>Language</span>
                    <a href="#">English<i class="lnr lnr-chevron-down"></i></a>
                    <!-- Dropdown Start -->
                    <ul class="ht-dropdown">
                        <li>
                            <a href="#"
                                ><img
                                    src="img\header\1.jpg"
                                    alt="language-selector"
                                />English</a
                            >
                        </li>
                        <li>
                            <a href="#"
                                ><img
                                    src="img\header\2.jpg"
                                    alt="language-selector"
                                />Francis</a
                            >
                        </li>
                    </ul>
                    <!-- Dropdown End -->
                </li>
                <li>
                    <span>Currency</span
                    ><a href="#"> USD $ <i class="lnr lnr-chevron-down"></i></a>
                    <!-- Dropdown Start -->
                    <ul class="ht-dropdown">
                        <li><a href="#">&#36; USD</a></li>
                        <li><a href="#"> € Euro</a></li>
                        <li><a href="#">&#163; Pound Sterling</a></li>
                    </ul>
                    <!-- Dropdown End -->
                </li>
                <li>
                    <a href="#">My Account<i class="lnr lnr-chevron-down"></i></a>
                    <!-- Dropdown Start -->
                    <ul class="ht-dropdown">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul>
                    <!-- Dropdown End -->
                </li>
            </ul>
        </div>
        <!-- Header Top End -->
    </div>
    <!-- Container End -->
</div> --}}
<script>
function delete_cart(id){
    $.ajax({
        url:'{{url('/')}}/delete_cart/'+id,
        type:'GET',

    }).done(function(response){
        $("#change-item").empty();
        $("#change-item").html(response);
        //console.log($("#soluong").val());
        $("#quanty-show").text($("#soluong").val());
        alertify.success('Xóa sản phẩm thành công !');

    });
}</script>