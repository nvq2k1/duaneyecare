<div class="main-categorie mb-all-40">
    <input type="hidden" name="" id="ma_loai" value="{{ $ma_loai }}">
    <!-- Grid & List Main Area End -->
    <div class="tab-content fix">
        <div id="grid-view" class="tab-pane fade show active">
            <div class="row">
                <!-- Single Product Start -->
                @foreach($list_sp as $sp)
                {{-- @if($sp->ma_loai == $ma_loai) --}}
                @php 
                if($sp->giamoi_sp == null){
                    $price=$sp->giacu_sp;
                }else{
                    $price=$sp->giamoi_sp;
                }
                @endphp
                @if(($price>$min) && ($price<$max))
                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="/chi-tiet-san-pham/{{$sp->ma_sp}}">
                                <img
                                    class="primary-img"
                                    src="{{url('/')}}/uploads/{{$sp->anh_sp}}"
                                    alt="single-product"
                                />
                                @php 
                                    $list_anh_sp = $sp->ds_anh->first();
                                @endphp
                                <img
                                    class="secondary-img"
                                    src="{{url('/')}}/uploads/{{$list_anh_sp->anh}}"
                                    alt="single-product"
                                />
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4>
                                    <a href="/chi-tiet-san-pham/{{$sp->ma_sp}}"
                                        >{{ $sp->ten_sp }}</a
                                    >
                                </h4>
                                @if($sp->giamoi_sp)
                                <p>
                                    <span class="price">{{number_format($sp->giamoi_sp)}}.VND</span
                                    ><del class="prev-price">{{number_format($sp->giacu_sp)}}.VND</del>
                                </p>
                                @php
                                    $giamgia=((($sp->giacu_sp)-($sp->giamoi_sp))/($sp->giacu_sp))*100;
                                @endphp
                                    @if($sp->sl_trong_kho>0)
                                    <div class="label-product  l_sale">
                                        {{FLOOR($giamgia)}}<span class="symbol-percent">%</span>
                                    </div>
                                    @else
                                    <div class="label-product l_sale1">
                                        <p> <strong style="color: red">Hết hàng</strong></p> 
                                    </div>
                                    @endif
                                @else
                                    <p>
                                        <span class="price">{{number_format($sp->giacu_sp)}}.VND</span>
                                    </p>
                                @endif
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="" title="Add to Cart">
                                        + Thêm vào giỏ</a
                                    >
                                </div>
                            </div>
                            
                        </div>
                        <!-- Product Content End -->
                    </div>
                </div>
                @endif
                {{-- @endif --}}
                @endforeach
                <!-- Single Product End -->	
            </div>
            <!-- Row End -->
        </div>
        <!-- #grid view End -->
        {{-- <div id="list-view" class="tab-pane fade">
            <!-- Single Product Start -->
            
            @foreach($list_sp as $sp)
            @if($sp->ma_loai == $ma_loai)
            @php 
            if($sp->giamoi_sp == null){
                $price=$sp->giacu_sp;
            }else{
                $price=$sp->giamoi_sp;
            }
            @endphp
            @if(($price>$min) && ($price<$max))
            <div class="single-product">
                <div class="row">
                    <!-- Product Image Start -->
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="pro-img">
                            <a href="/chi-tiet-san-pham/{{$sp->ma_sp}}">
                                <img
                                    class="primary-img"
                                    src="{{url('/')}}/uploads/{{$sp->anh_sp}}"
                                    alt="single-product"
                                />
                                @php 
                                    $list_anh_sp = $sp->ds_anh->first();
                                @endphp
                                <img
                                    class="secondary-img"
                                    src="{{url('/')}}/uploads/{{$list_anh_sp->anh}}"
                                    alt="single-product"
                                />
                            </a>
                        </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="pro-content hot-product2">
                            <h4>
                                <a href="/chi-tiet-san-pham/{{$sp->ma_sp}}"
                                    >{{ $sp->ten_sp }}</a
                                >
                            </h4>
                            @if($sp->giamoi_sp)
                                <p>
                                    <span class="price">{{number_format($sp->giamoi_sp)}}.VND</span
                                    ><del class="prev-price">{{number_format($sp->giacu_sp)}}.VND</del>
                                </p>
                                @php
                                    $giamgia=((($sp->giacu_sp)-($sp->giamoi_sp))/($sp->giacu_sp))*100;
                                @endphp
                                    <div class="label-product l_sale">
                                        {{FLOOR($giamgia)}}<span class="symbol-percent">%</span>
                                    </div>
                                @else
                                    <p>
                                        <span class="price">{{number_format($sp->giacu_sp)}}.VND</span>
                                    </p>
                                @endif
                            
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a
                                        href="cart.html"
                                        title=""
                                        data-original-title="Add to Cart"
                                    >
                                        + Thêm vào giỏ</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                </div>
            </div>
            @endif
            @endif
            @endforeach
            <!-- Single Product End -->
        </div> --}}
        
        <!-- #list view End -->
        
        <!-- Product Pagination Info -->
    </div>
    <!-- Grid & List Main Area End -->
</div>