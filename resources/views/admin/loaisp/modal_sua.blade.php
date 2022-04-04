                                <div class="modal fade" id="sua_loaisp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật loại sản phẩm</h5>
                                                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST"  role="form" enctype="multipart/form-data" action="/admin/sua-loai-san-pham/{{$loaisp->ma_loai}}">
                                                @csrf
                                                        <div class="form-group">
                                                            <label for="pro_name">Tên loại sản phẩm</label>
                                                            <input type="text" class="form-control" id="tenloai" name="tenloai" placeholder="Nhập tên loại sản phẩm" value="{{$loaisp->ten_loai}}">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="anhien">Trạng thái</label>
                                                            
                                                                <select class="form-control" name="anhien" aria-label="Default select example">
                                                                            <option value="1" @if($loaisp->anhien==1) selected @endif>Hiển thị   </option>
                                                                            <option value="0" @if($loaisp->anhien==0) selected @endif>Ẩn đi  </option>
                                                                </select>
                                                        </div>
                                                            
                                                        
                                                        
                                                        <br>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit">Cập nhật</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                   
                                                   
                                                </div>
                                                </div>
                                            </div>
                                            </div