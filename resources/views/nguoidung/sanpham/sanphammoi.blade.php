<div class="top-new mb-40">
    <h3 class="sidebar-title">Sản phẩm mới nhất</h3>
    <div class="side-product-active owl-carousel">
        <!-- Side Item Start -->
        <div class="side-pro-item">
            <!-- Single Product Start -->
            @foreach($topnew as $tn)
            <div class="single-product single-product-sidebar">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="/chi-tiet-san-pham/{{$tn->ma_sp}}">
                        <img
                            class="primary-img1"
                            src="{{url('/')}}/uploads/{{$tn->anh_sp}}"
                            alt="single-product"
                        />
                        @php 
						$list_anh_sp = $tn->ds_anh->first();
            							
				        @endphp
                        
                    </a>
                    @if($tn->giamoi_sp)
                    @php
                            $giamgia=((($tn->giacu_sp)-($tn->giamoi_sp))/($tn->giacu_sp))*100;
                    @endphp

                           
                            
                    @else

                    @endif
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <h4>
                        <a href="/chi-tiet-san-pham/{{$tn->ma_sp}}">{{ $tn->ten_sp }}</a>
                    </h4>
                    <p>
                        @if($tn->giamoi_sp)
                        <p>
                            <span class="price">{{number_format($tn->giamoi_sp)}}</span
                            >
                        </p>
                        
                        @else
                        <p>
                            <span class="price">{{number_format($tn->giacu_sp)}}</span>
                        </p>
                    
                        @endif
                    </p>
                </div>
                <!-- Product Content End -->
            </div>
            @endforeach
            <!-- Single Product End -->
         
        </div>
        <!-- Side Item End -->
        
    </div>
</div>