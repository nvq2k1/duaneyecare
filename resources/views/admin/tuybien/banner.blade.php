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
                        <!-- Button trigger modal -->
                        

                        <!-- Modal -->
                                          

                    <!-- DataTales Example -->
                    

                </div>
                <!-- /.container-fluid -->
                <div class="container">
                
                <h3 class="text-center">Chỉnh sửa Banner</h3><hr>
                @include('admin.thongbao')
                <div id="modal_thuvien"></div>
               
                    <div class="row">
                    
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" onclick="thuvien_anh()">
                                Thư viện banner
                            </button>
                            <br><br>
                            <form method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5 for="ds_anh">Tải ảnh lên</h5>
                                        <input type="file" class="form-control" id="ds_banner" name="ds_banner[]" placeholder="Chọn ảnh khác sản phẩm" multiple="multiple" @if($errors->has('ds_anh'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                    </div>
                                        @foreach($list_banner as $b)
                                        <h3>Banner-{{ $loop->iteration }}</h3>
                                        <div class="row mt-3"><img src="{{ url('/') }}/uploads/{{$b->anh_banner}}" alt="" width="900px" height="200px"></div>
                                        <br><br>
                                        @endforeach
                                       
                                    
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>without bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  </head>
  <body>
   
    <div id="mota_lienhe"></div>
    <script>
      $('#summernote').summernote({
        placeholder: 'Nhập địa chỉ',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
    <script>
      $('#mota_home').summernote({
        placeholder: 'Nhập mô tả trang chủ',
        tabsize: 2,
        height: 80,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
  </body>
</html>
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

</html>
<script>
    function thuvien_anh(){
			$.ajax({
				url:'{{url('/')}}/admin/thu-vien-anh',
				type:'GET',
	
			}).done(function(response){
				$("#modal_thuvien").empty();
				$("#modal_thuvien").html(response);
                $("#thuvien_anh").modal('show');
				//console.log($("#soluong").val());
				//$("#quanty-show").text($("#soluong").val());
				//alertify.success('Xóa sản phẩm thành công !');
	
			});
		}
</script>