<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- include libraries(jQuery, bootstrap) -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-text mx-3 " style="color:#7ACC1D">Trang quản trị<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-size:12pt">Thống kê</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            @if(Auth::guard('admin')->user()->phan_quyen==1)
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-san-pham" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí sản phẩm</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-loai-san-pham ">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí loại </span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-hoa-don" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí hóa đơn</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-tin-tuc ">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí tin tức</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-binh-luan ">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí bình luận</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-voucher ">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí mã giảm giá</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link " href="/admin/tuy-chinh-banner">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Tùy chỉnh banner</span>
                </a>
                
            </li>
            
            
            <!-- Nav Item - Utilities Collapse Menu -->
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/danh-sach-thanh-vien" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span style="font-size:12pt">Quan li thành viên</span>
                </a>
                
            </li>
            @elseif(Auth::guard('admin')->user()->phan_quyen==0)
            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-binh-luan ">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí bình luận</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link " href="/admin/danh-sach-tin-tuc ">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="font-size:12pt">Quản lí tin tức</span>
                </a>
                
            </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-table"></i>
                    <span style="font-size:12pt">Trở về trang chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>