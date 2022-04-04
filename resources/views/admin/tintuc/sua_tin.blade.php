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
                <h3 class="text-center">Cập nhật bài viết</h3><hr>
                    
                    <div class="row">
                   
                        <div class="col-12">
                            <form method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="pro_name">Tiêu đề tin tức</label>
                                        <input type="text" class="form-control" id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề tin tức" value="{{ $tin->tieu_de }}">    
                                    </div>
                                    @if($errors->has('tieu_de'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                            {{$errors->first('tieu_de')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="file">Mô tả ngắn</label>
                                        <textarea name="mo_ta_ngan" class="form-control"  id="summernote1" cols="30" rows="10">{{ $tin->mo_ta }}</textarea>
                                    </div>
                                    @if($errors->has('noi_dung'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                            {{$errors->first('mo_ta_ngan')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="file">Nội dung bài viết</label>
                                        <textarea name="noi_dung" class="form-control"  id="summernote" cols="30" rows="10">{{ $tin->noi_dung }}</textarea>
                                    </div>
                                    @if($errors->has('noi_dung'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                            {{$errors->first('noi_dung')}}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="anh_sp">Ảnh đại diện</label>
                                        <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" placeholder="Chọn hình ảnh sản phẩm" @if($errors->has('anh_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                        <img src="{{url('/')}}/uploads/{{$tin->hinh_anh}}" alt="" width="150px" height="100px">  
                                    </div>
                                    @if($errors->has('hinh_anh'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                            {{$errors->first('hinh_anh')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="anhien">Trạng thái</label>
                                        
                                            <select class="form-control" name="anhien" aria-label="Default select example">
                                                        <option value="1" @if($tin->anhien==1) selected @endif>Hiển thị   </option>
                                                        <option value="0" @if($tin->anhien==0) selected @endif>Ẩn đi  </option>
                                            </select>
                                    </div>
                                    @if($errors->has('anhien'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                            {{$errors->first('anhien')}}
                                        </div>
                                    @endif
                                        
                                    
                                    
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Thêm</button>
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
    
        
        <script>
          $('#summernote').summernote({
            placeholder: 'Nhập nội dung tin tức',
            tabsize: 2,
            height: 250,
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

          $('#summernote1').summernote({
            placeholder: 'Mô tả ngắn gọn',
            tabsize: 2,
            height: 100,
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