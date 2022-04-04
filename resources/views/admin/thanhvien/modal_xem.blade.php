<div class="modal fade" id="xem_tv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin thành viên</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><strong>Tên thành viên : <span style="color: red">{{$tv->ten_tv}}</span></strong> </a>
                <a href="#" class="list-group-item list-group-item-action"><strong>Số điện thoại : <span style="color: red">{{$tv->sodienthoai}}</span></strong> </a>
                <a href="#" class="list-group-item list-group-item-action"><strong>Email : <span style="color: red">{{$tv->email}}</span></strong> </a>
                <a href="#" class="list-group-item list-group-item-action"><strong>Địa chỉ : <span style="color: red">{{$tv->diachi}}</span></strong> </a>
                <a href="#" class="list-group-item list-group-item-action"><strong>Tổng số đơn hàng : <span style="color: red">{{$sl_dh}}</span></strong> </a>
                <a href="#" class="list-group-item list-group-item-action"><strong>Trạng thái tài khoản : 
                    @if($tv->trang_thai==0) <span class="badge badge-success">Hoạt động</span> @else <span class="badge badge-danger">Đã khóa</span>  @endif   
                </strong> </a>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
           
           
        </div>
        </div>
    </div>
    </div