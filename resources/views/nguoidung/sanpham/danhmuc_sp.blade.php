<div class="electronics mb-40">
    <h3 class="sidebar-title">Danh mục sản phẩm</h3>
    <div
        id="shop-cate-toggle"
        class="category-menu sidebar-menu sidbar-style"
    >
        <ul>
            @foreach($list_loai as $l)
            <li class="has-sub">
                <a onclick="sp_danhmuc({{ $l->ma_loai }})">{{ $l->ten_loai }}</a>  
            </li> 
            {{-- <li class="has-sub">
                <a href="/san-pham-danh-muc/{{ $l->ma_loai }}">{{ $l->ten_loai }}</a> 
                 
            </li> --}}
            @endforeach
        </ul>
    </div>
    <!-- category-menu-end -->
</div>