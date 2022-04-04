<div class="like-product-area pb-90">
    <h2 class="section-ttitle2 mb-30">Mắt kiếng bán chạy nhất 2021</h2>
    <!-- Like Product Activation Start Here -->
    <div class="like-pro-active owl-carousel">
        @foreach($sp_hotdeal as $p)
        @if($p->luot_ban>10)
        <div class="single-product">
            <!-- Product Image Start -->
            <div class="pro-img">
                <a href="/chi-tiet-san-pham/{{$p->ma_sp}}">
                    <img
                        class="primary-img"
                        src="{{url('/')}}/uploads/{{$p->anh_sp}}"
                        alt="single-product"
                    />
                    @php 
						$list_anh_sp = $p->ds_anh->first();
            							
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
                    <h4><a href="/chi-tiet-san-pham/{{$p->ma_sp}}">{{$p->ten_sp}}</a></h4>
                    @if($p->giamoi_sp)
                        <p>
                            <span class="price">{{number_format($p->giamoi_sp)}}</span
                            ><del class="prev-price">{{number_format($p->giacu_sp)}}</del>
                        </p>
                        @php
                            $giamgia=((($p->giacu_sp)-($p->giamoi_sp))/($p->giacu_sp))*100;
                        @endphp
                            
                                @if($p->sl_trong_kho>0)
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
                        <span class="price">{{number_format($p->giacu_sp)}}</span>
                    </p>
                    
                    @endif
                    
                     
                </div>
                  
                <div class="pro-actions">
                    <div class="actions-primary">
                        <a onclick="Addcart({{$p->ma_sp}})" href="javascript:" title="Add to Cart"> + Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
                 
            
            <!-- Product Content End -->
        </div>
        @endif
        @endforeach
        
    
</div>