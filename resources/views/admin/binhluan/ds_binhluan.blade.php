<!DOCTYPE html>
<html lang="en">

<head>
    <style>.switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
      }
      
      /* Hide default HTML checkbox */
      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }
      
      /* The slider */
      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }
      
      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }
      
      input:checked + .slider {
        background-color: #2196F3;
      }
      
      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }
      
      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }
      
      .slider.round {
        border-radius: 34px;
      }
      
      .slider.round:before {
        border-radius: 50%;
      }</style>
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
                @include('admin.loaisp.modal_them')
                
                <!-- Modal -->
                <div id="modal-xoa"></div>
                <div id="modal-sua"></div>
                <!-- Button trigger modal -->
                    
                    <!-- Button trigger modal -->

                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH BÌNH LUẬN </h6><br>
                          
                        </div>
                        <div class="card-body main_bl">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Nội dung </th>
                                            <th>Người bình luận </th>
                                            <th>Thời gian</th>
                                            <th>Bình luận tại</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Nội dung </th>
                                            <th>Người bình luận </th>
                                            <th>Thời gian</th>
                                            <th>Bình luận tại</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    @foreach($list_bl as $bl)
                                    @php 
										$tv=$bl->thanhvien;
									@endphp
                                      <tr>
                                          <td>#{{$bl->ma_bl}}</td>
                                          <td>{{$bl->noi_dung}}</td>
                                          <td>{{$tv[0]->ten_tv}}</td>
                                          <td>
                                            @php
                                            $date=date_create("$bl->ngay_bl");
                                            echo date_format($date,"d-m-Y H:i:s"); 
                                            @endphp
                                            </td>
                                          
                                          <td>
                                              @if($bl->ma_tt==null)
                                                    <a href="/chi-tiet-san-pham/{{ $bl->ma_sp }}">Sản phấm #{{ $bl->ma_sp }}</a>
                                              @else
                                                    <a href="/xem-bai-viet/{{ $bl->ma_tt }}">Bài viết #{{ $bl->ma_tt}}</a>
                                              @endif
                                        
                                            </td>
                                          <td >
                                          {{-- @if($bl->anhien==1)     <span class="badge badge-success">Đang hiện</span> @endif 
                                                @if($bl->anhien==0)     <span class="badge badge-danger">Đang ẩn</span> @endif  --}}

                                                <label class="switch">
                                                    <input type="checkbox" id="anhien{{ $bl->ma_bl }}"  onclick="anhien({{ $bl->ma_bl }})" value="1"
                                                    @if($bl->anhien ==1) checked @endif
                                                    > 
                                                    <span class="slider round"></span>
                                                </label>
                                        </td>
                                          <td style="width:100px">
                                          
                                          <a  onclick="xoa_bl({{$bl->ma_bl}})" href="javascript:"><i class='fas fa-trash-alt' style='font-size:24px'></i></a>
                                          
                                          </td>
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
<script language="javascript">
    function xoa_bl(id){
        $.ajax({
            url:'/admin/xoa-binh-luan-modal/'+id,
            type:'GET',

        }).done(function(response){
            
            $("#modal-xoa").empty();
            $("#modal-xoa").html(response);
            $("#xoabl").modal('show');
            //console.log($("#soluong").val());
            

        });
    }
    function sualoai(id){
        $.ajax({
            url:'/admin/sua-loai-san-pham-modal/'+id,
            type:'GET',

        }).done(function(response){
            
            $("#modal-xoa").empty();
            $("#modal-xoa").html(response);
            $("#sua_loaisp").modal('show');
            //console.log($("#soluong").val());
            

        });
    }
    function anhien(id){
        if($('#anhien'+id).prop("checked")){
            $.ajax({
            url:'/admin/hien-binh-luan/'+id,
            type:'GET',

            }).done(function(response){
            
            $("#main_bl").empty();
            $("#main_bl-xoa").html(response);
            alertify.success('Hiện thị bình luận thành công !');
            //$("#sua_loaisp").modal('show');
            //console.log($("#soluong").val());
            

            });
        }else {
            $.ajax({
            url:'/admin/an-binh-luan/'+id,
            type:'GET',

            }).done(function(response){
            
            $("#main_bl").empty();
            $("#main_bl").html(response);
            alertify.success('Ẩn bình luận thành công !');
            //$("#sua_loaisp").modal('show');
            //console.log($("#soluong").val());
            

            });
        }
    }
    
</script>
</html>
