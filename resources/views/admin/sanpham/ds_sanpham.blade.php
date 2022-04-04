<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{url('/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('/')}}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{url('/')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include("admin.menu")
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include("admin.nav")

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                @include('admin.thongbao')  
               
                    <!-- DataTales Example -->
                <!-- Button trigger modal -->
                @include('admin.sanpham.modal_them')
                
                <!-- Modal -->
                <div id="modal-xoa"></div>
                <div id="modal-sua"></div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH LOẠI SẢN PHẨM </h6><br>
                           <button class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#them_sp" >Thêm loại sản phẩm</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Loại </th>
                                            <th>Giá cũ</th>
                                            <th>Giá mới</th>
                                            <th>Hình ảnh</th>
                                            <th>Còn lại </th>
                                            <th>Thời điểm tạo</th>
                                            <th>Trạng thái </th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Loại </th>
                                            <th>Giá cũ</th>
                                            <th>Giá mới</th>
                                            <th>Hình ảnh</th>
                                            <th>Còn lại </th>
                                            <th>Thời điểm tạo</th>
                                            <th>Trạng thái </th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($sanpham as $sp)
                                        <tr>
                                            <td>{{$sp->ma_sp}}</td>
                                            <td>{{$sp->ten_sp}}</td>
                                            <td>{{$sp->ten_loai}}</td>
                                            <td>{{number_format($sp->giacu_sp)}}.VND</td>
                                            <td>{{number_format($sp->giamoi_sp)}}.VND</td>
                                            <td style="width:80px"><img src="{{url('/')}}/uploads/{{$sp->anh_sp}}" alt="" width="80px" height="80px" border-radius="10px"></td>
                                            <td>{{$sp->sl_trong_kho}} Chiếc</td>
                                            
                                            <td>
                                                @php
                                                $date=date_create("$sp->thoidiemtao");
                                                echo date_format($date,"d-m-Y H:i:s"); 
                                                @endphp
                                            </td>
                                            <td>
                                                @if($sp->anhien=1)<span class="badge badge-success">Đang hiện</span>
                                                                    @else  <span class="badge badge-danger">Đang ẩn</span>
                                                                    @endif
                                            </td>
                                            <td style="width:100px"><a onclick="sua_sp({{$sp->ma_sp}})" href="javascript:"><i class='fas fa-edit' style='font-size:24px'></i></a>|<a onclick="xoa_sp({{$sp->ma_sp}})" href="javascript:"><i class='fas fa-trash-alt' style='font-size:24px'></i></a> </td>
                                        </tr>
                                    @endforeach 
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('/')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{url('/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('/')}}/js/demo/datatables-demo.js"></script>

</body>
<script>
    $(document ).ready(function() {
        $('#summernote').summernote();
        
    });
    function xoa_sp(id){
        $.ajax({
            url:'/admin/xoa-san-pham-modal/'+id,
            type:'GET',

        }).done(function(response){
            
            $("#modal-xoa").empty();
            $("#modal-xoa").html(response);
            $("#xoa_sp").modal('show');
            //console.log($("#soluong").val());
            

        });
    }
    function sua_sp(id){
        $.ajax({
            url:'/admin/sua-san-pham-modal/'+id,
            type:'GET',

        }).done(function(response){
            
            $("#modal-sua").empty();
            $("#modal-sua").html(response);
            $("#sua_sp").modal('show');
            //console.log($("#soluong").val());
            

        });
    }
    $('#summernoteTermsAndCondition').summernote({
            placeholder: '',
            height: 200,
            popover: {
                air: [
                  ['color', ['color']],
                  ['font', ['bold', 'underline', 'clear']]
                ]
            }
        });
        $('#summernote1').summernote({
            placeholder: 'Nhập mô tả sản phẩm',
            tabsize: 2,
            height: 150
        });

       

        
        // $(document ).ready(function() {
        //     console.log( "ready!" );
        // });
             
    
    
</script>


</html>
