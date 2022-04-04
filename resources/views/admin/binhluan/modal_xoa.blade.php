
  <div class="modal fade" id="xoabl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            Bạn có chắc chắn muốn xóa bình luận <strong style="color: red"> #{{ $id }} </strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
           
            <a class="btn btn-primary" href="/admin/xoa-binh-luan/{{$id}}">Đồng ý</a>
        </div>
        </div>
    </div>
    </div>