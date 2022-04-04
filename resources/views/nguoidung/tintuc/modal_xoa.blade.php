<div class="modal fade" id="xoa_bl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" onclick="tat_modal()"  aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <h6>Bạn có chắc chắn xóa bình luận <span style="color: red">{{ $bl->noi_dung }}</span> không ?</h6>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="tat_modal()"  data-bs-dismiss="modal">Hủy</button>
           
            <a class="btn btn-primary" href="/xoa-binh-luan-user/{{ $bl->ma_bl  }}">Chắc chắn</a>
        </div>
        </div>
    </div>
    </div>