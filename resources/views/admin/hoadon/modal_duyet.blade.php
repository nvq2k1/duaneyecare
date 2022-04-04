
  <div class="modal fade" id="duyetdon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            Bạn có chắc chắn duyệt đơn hàng <strong style="color: red"> #{{ $id }} </strong>

            Sau khi bạn duyệt đơn hàng này sẽ có trạng thái <strong style="color: #28a745"> đã giao hàng </strong> và <strong style="color: #28a745"> đã thanh toán </strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
           
            <a class="btn btn-primary" href="/admin/duyet-don-hang-db/{{$id}}">Đồng ý</a>
        </div>
        </div>
    </div>
    </div>