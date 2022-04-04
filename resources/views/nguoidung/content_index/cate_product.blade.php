<div class="second-arrivals-product ">
    <div class="container">
        <div class="main-product-tab-area">
            <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>Mắt kiếng đang bán chạy</h2>
                </div>
                <!-- Nav tabs -->
                <ul class="nav tabs-area" role="tablist">
                    
                    @foreach($loai_sp as $l)
                    @if ($loop->first)
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                data-toggle="tab"
                                href="#ak" onclick="sanphamtheoloai({{$l->ma_loai}})"
                                >{{$l->ten_loai}}</a>
                        </li> 
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="javascript:" onclick="sanphamtheoloai({{$l->ma_loai}})"
                                >{{$l->ten_loai}}</a
                            >
                        </li>
                    @endif
                    @endforeach
                    
                </ul>
            </div>

            <!-- Tab Contetn Start -->
            
            
            
                <!-- #beauty End Here -->
                <div id="ok"  class="tab-pane fade show active">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="best-seller-pro-active owl-carousel ">
                        <!-- Single Product Start -->
                    
                        <span class="sp d-flex flex-row">
                        @foreach($sp_fisrt as $p)
                        <div class="single-product ml-2 " style="width:228px;height: 270px;">
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
                        @endforeach
                        
                        </span>
                    
                        <!-- Product Image Start -->
                        
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        
                        <!-- Product Content End -->
                    
                       
                        <!-- Single Product End -->
                        <!-- Single Product Start -->
                        
                    <!-- Arrivals Product Activation End Here -->
                
            
                <!-- #electronics End Here -->
            </div>
            <!-- Tab Content End -->
        
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
<script>
    function sanphamtheoloai(id){
        $.ajax({
            url:'/loai-san-pham/'+id,
            type:'GET',

        }).done(function(response){
            
            $(".sp").empty();
            $(".sp").html(response);
            //console.log($("#soluong").val());
            

        });
    }
    
</script>