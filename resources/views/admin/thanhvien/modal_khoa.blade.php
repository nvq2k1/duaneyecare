<div class="modal fade" id="khoa_tv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin thành viên</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <p><strong>Bạn có chắc chắn muốn khóa tài khoản <span style="color: red">{{$tv->ten_tv}}</span> không ?</strong></p>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" href="/admin/thay-doi-trang-thai-thanh-vien/{{$tv->ma_tv}}">Đồng ý</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
           
           
        </div>
        </div>
    </div>
    </div