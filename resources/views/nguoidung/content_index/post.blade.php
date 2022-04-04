<div class="blog-area ptb-95 off-white-bg ptb-sm-55">
    <div class="container">
        <div class="like-product-area">
            <h2 class="section-ttitle2 mb-30">Tin mới nhất</h2>
            <!-- Latest Blog Active Start Here -->
            <div class="latest-blog-active owl-carousel">
                <!-- Single Blog Start -->
                @foreach($list_tin as $t)
                <div class="single-latest-blog">
                    <div class="blog-img">
                        <a href="/xem-bai-viet/{{ $t->ma_tt }}"
                            ><img src="{{url('/')}}/uploads/{{$t->hinh_anh}}" alt="blog-image"
                        /></a>
                    </div>
                    <div class="blog-desc">
                        <h4>
                            <a href="/xem-bai-viet/{{ $t->ma_tt }}">{{ $t->tieu_de }}</a>
                        </h4>
                        <ul class="meta-box d-flex">
                            @php 
								$nguoi_dang=$t->admin;
							@endphp
                            <li><span>Đăng bởi {{$nguoi_dang->tai_khoan}}</span></li>
                        </ul>
                        <div class="text">
                            @php 
                            echo($t->mo_ta) ;
                            
                            
                            @endphp
                        </div>
                        <a class="readmore" href="/xem-bai-viet/{{ $t->ma_tt }}">Xem thêm</a>
                    </div>
                    <div class="blog-date">
                        @php
                            $date=date_create("$t->ngay_dang");
                            
                        @endphp
                        <span>@php echo date_format($date,"d"); @endphp</span>
                        @php echo date_format($date,"m"); @endphp
                    </div>
                </div>
                
                @endforeach
                
                <!-- Single Blog End -->
                <!-- Single Blog Start -->
                
                <!-- Single Blog End -->
            </div>
            <!-- Latest Blog Active End Here -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
