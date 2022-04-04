
<div class="modal fade" id="them_sp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                                                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="/admin/them-san-pham" role="form" enctype="multipart/form-data" action="/admin/them-loai-san-pham">
                                                        @csrf
                                                         
                                                        <div class="form-group">
                                                            <label for="ten_sp">Tên  sản phẩm</label>
                                                            <input type="text" class="form-control" id="ten_sp" name="ten_sp" placeholder="Nhập tên sản phẩm" value="{{old('ten_sp')}}"
                                                            @if($errors->has('ten_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                                                            >
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="loai_sp">Loại sản phẩm</label>
                                                            
                                                                <select class="form-control" name="loai_sp" aria-label="Default select example" @if($errors->has('loai_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                                                             
                                                                    @foreach($loaisp as $l)
                                                                            <option value="{{$l->ma_loai}}">{{$l->ten_loai}}</option> 
                                                                    @endforeach       
                                                                </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="gia_cu">Giá cũ</label>
                                                                    <input type="text" class="form-control" id="gia_cu" name="gia_cu" placeholder="Nhập giá cũ sản phẩm" value="{{old('gia_cu')}}"
                                                                    @if($errors->has('gia_cu'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                                                                    >
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="gia_moi">Giá mới</label>
                                                                        <input type="text" class="form-control" id="gia_moi" name="gia_moi" placeholder="Nhập giá mới sản phẩm" value="{{old('gia_moi')}}" 
                                                                        @if($errors->has('gia_moi'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="anh_sp">Ảnh đại diện</label>
                                                            <input type="file" class="form-control" id="anh_sp" name="anh_sp" placeholder="Chọn hình ảnh sản phẩm" @if($errors->has('anh_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ds_anh">Danh sách ảnh</label>
                                                            <input type="file" class="form-control" id="ds_anh" name="ds_anh[]" placeholder="Chọn ảnh khác sản phẩm" multiple="multiple" @if($errors->has('ds_anh'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>
                                                        </div>
                                                        </div>
                                                        <div class="form-group ml-3">
                                                            <label for="so_luong "> Số lượng</label>
                                                            <input type="text" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lương sản phẩm" value="{{old('so_luong')}}"
                                                            @if($errors->has('so_luong'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                                                            >
                                                        </div>
                                                        <div class="form-group ml-3">
                                                        <label for="file">Mô tả sản phẩm</label>
                                                            <textarea name="mota_sp" class="form-control"  id="summernote1" cols="20" rows="5"  @if($errors->has('mota_sp'))style="font-weight: 500 !important ;border: 2px red solid;"@endif>Mô tả sản phẩm {{old('mota_sp')}}</textarea>
                                                        </div>
                                                        <script>
                                                            $('#summernote1').summernote({
                                                              placeholder: 'Nhập mô tả sản phẩm',
                                                              tabsize: 2,
                                                              height: 150
                                                            });
                                                          </script>
                                                        
                                                        <div class="form-group ml-3">
                                                            <button class="btn btn-primary" type="submit">Lưu lại</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                                
                                                </div>
                                            </div>
                                            
                        
                                            