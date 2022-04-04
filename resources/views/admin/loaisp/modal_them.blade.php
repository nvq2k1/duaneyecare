                        <div class="modal fade" id="them_loaisp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản phẩm</h5>
                                                    <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" role="form" enctype="multipart/form-data" action="/admin/them-loai-san-pham">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="pro_name">Tên loại sản phẩm</label>
                                                            <input type="text" class="form-control" id="tenloai" name="tenloai" placeholder="Nhập tên loại sản phẩm" >
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="anhien">Trạng thái</label>
                                                            
                                                                <select class="form-control" name="anhien" aria-label="Default select example">
                                                                            <option selected>Tùy chọn</option>
                                                                        
                                                                            <option value="1">Hiển thị  </option>
                                                                            <option value="0">Ẩn đi  </option>
                                                                            
                                                                </select>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                   
                                                   
                                                </div>
                                                </div>
                                            </div>
                                            </div