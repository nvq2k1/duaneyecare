<div class="modal fade" id="them_voucher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm loại mã giảm giá</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
        <form method="POST" role="form" enctype="multipart/form-data" action="/admin/them-voucher">
                @csrf
                <div class="form-group">
                    <label for="pro_name">Mã giảm giá</label>
                    <input type="text" class="form-control" id="ten_gg" name="ten_gg" placeholder="Nhập mã giảm giá"  value="{{old('ten_gg')}}"
                    @if($errors->has('ten_gg'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                    >    
                </div>
                <div class="form-group">
                    <label for="pro_name">Giá trị giảm giá (%)</label>
                    <input type="text" class="form-control" id="gia_tri" name="gia_tri" placeholder="Nhập giá trị của mã giảm giá" value="{{old('gia_tri')}}"
                    @if($errors->has('gia_tri'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                    >    
                </div>
                <div class="form-group">
                    <label for="pro_name">Số lượng dùng</label>
                    <input type="text" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập giá trị của mã giảm giá" value="{{old('so_luong')}}"
                    @if($errors->has('so_luong'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                    >    
                </div>
                <div class="form-group">
                    <label for="pro_name">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="ngay_tao" name="ngay_tao" placeholder="Chọn ngày bắt đầu" value="{{old('ngay_tao')}}"
                    @if($errors->has('ngay_tao'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                    >    
                </div>
                <div class="form-group">
                    <label for="pro_name">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="ngay_het_han" name="ngay_het_han" placeholder="Chọn ngày kết thúc" value="{{old('ngay_het_han')}}"
                    @if($errors->has('ngay_het_han'))style="font-weight: 500 !important ;border: 2px red solid;"@endif
                    >    
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