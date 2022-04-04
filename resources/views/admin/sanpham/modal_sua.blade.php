

<div class="modal fade" id="sua_sp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
                                                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST"  role="form" enctype="multipart/form-data" action="/admin/sua-san-pham/{{$sanpham->ma_sp}}">
                                                        @csrf
                                                         
                                                        <div class="form-group">
                                                            <label for="ten_sp">Tên  sản phẩm</label>
                                                            <input type="text" class="form-control" id="ten_sp" name="ten_sp" placeholder="Nhập tên sản phẩm" value="{{$sanpham->ten_sp}}"
                                                            @if($errors->has('ten_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                                                            > 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="loai_sp">Loại sản phẩm</label>
                                                                <select class="form-control" name="loai_sp" aria-label="Default select example" @if($errors->has('loai_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>        
                                                                    @foreach($loaisp as $l)
                                                                            <option value="{{$l->ma_loai}}" {{$l->ma_loai == $sanpham->ma_loai ? 'selected':''}}>{{$l->ten_loai}}</option> 
                                                                    @endforeach       
                                                                </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="gia_cu">Giá cũ</label>
                                                                    <input type="text" class="form-control" id="gia_cu" name="gia_cu" placeholder="Nhập giá cũ sản phẩm" value="{{$sanpham->giacu_sp}}"
                                                                    @if($errors->has('gia_cu'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="gia_moi">Giá mới</label>
                                                                        <input type="text" class="form-control" id="gia_moi" name="gia_moi" placeholder="Nhập giá mới sản phẩm" value="{{$sanpham->giamoi_sp}}" 
                                                                        @if($errors->has('gia_moi'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="anh_sp">Ảnh đại diện</label>
                                                            <input type="file" class="form-control" id="anh_sp" name="anh_sp" placeholder="Chọn hình ảnh sản phẩm" @if($errors->has('anh_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                                            <br>
                                                            <img src="{{url('/')}}/uploads/{{$sanpham->anh_sp}}" style="border:2px black solid" alt="{{url('/')}}/uploads/{{$sanpham->anh_sp}}" width="100px">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ds_anh">Danh sách ảnh</label>
                                                            <input type="file" class="form-control" id="ds_anh" name="ds_anh[]" placeholder="Chọn ảnh khác sản phẩm" multiple="multiple" @if($errors->has('ds_anh'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                                            <br>
                                                            @foreach($ds_anh as $a)
                                                            <img src="{{url('/')}}/uploads/{{$a->anh}}" style="border:2px black solid" alt="{{url('/')}}/uploads/{{$a->anh}}" width="100px">
                                                            @endforeach
                                                        </div>
                                                        
                                                        <div class="form-group ml-3">
                                                            <label for="so_luong "> Số lượng</label>
                                                            <input type="text" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lương sản phẩm" value="{{$sanpham->sl_trong_kho}} "
                                                            @if($errors->has('so_luong'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                                                            >
                                                        </div>
                                                        <div class="form-group ml-3">
                                                        
                                                        <label for="file">Mô tả sản phẩm</label>
                                                        <textarea name="mota_sp" class="form-control" class="summernote"  id="summernote" cols="20" rows="5"  @if($errors->has('mota_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>{{$sanpham->mota_sp}}</textarea>
                                                        </div>
                                                        <script>
                                                            
                                                             $(document ).ready(function() {
                                                                $('#summernote').summernote();
                                                            });
                                                             
                                                           
                                                          </script>
                                                          <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                                                          <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
                                                          <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
                                                          
                                                        
                                                    
                                                      
                                                        <br>
                                                        <div class="form-group ml-3">
                                                            <button class="btn btn-primary" type="submit">Lưu lại</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                   
                                                   
                                                </div>
                                                </div>
                                            </div>
                                            
                        
                                            