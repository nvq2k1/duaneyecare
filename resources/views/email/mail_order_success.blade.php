<style type="text/css">
    body,
    table,
    td,
    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    @media screen and (max-width: 480px) {
        .mobile-hide {
            display: none !important;
        }

        .mobile-center {
            text-align: center !important;
        }
    }

    div[style*="margin: 16px 0;"] {
        margin: 0 !important;
    }
    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }
</style>
<img  class="center" src="https://matkinheyecare.click/img/index/logo.png" alt="" width="220px" height="140px">
<p style="font-size: 18px;  color:red">MẮT KÍNH EYECARE TRÂN TRỌNG THÔNG BÁO !</p>
<p style="font-size: 16px;">Đơn hàng của quý khách đã được đặt thành công !</p>
<hr>
<li><p style="font-size: 14px; ">Họ tên <strong style="color: red">{{ $data['hoten'] }}</strong></p></li>
<li><p style="font-size: 14px; ">Số điện thoại <strong style="color: red">{{ $data['sdt_nhan'] }}</strong></p></li>
<li><p style="font-size: 14px; ">Email <strong style="color: red">{{ $data['email_nhan'] }}</strong></p></li>
<li><p style="font-size: 14px; ">Địa chỉ <strong style="color: red">{{ $data['email_nhan'] }}</strong></p></li>
 <p>{{$data['voucher']->ma_gg}}</p> 
{{-- @if($data['voucher'] && $data['voucher']!=null)
<li><p style="font-size: 14px; ">Tổng giá trị đơn hàng  <strong style="color: red"> <del>{{ number_format($data['hoadon']->tong_tien) }}đ </del></strong></p></li>
<li><p style="font-size: 14px; ">Mã giảm giá <strong style="color: red">Có </strong></p></li>
<li><p style="font-size: 14px; ">Còn lại <strong style="color: red">{{ number_format($data['hoadon']->tong_tien*0,01*$data['voucher']->gia_tri) }} </strong></p></li>
@else
<li><p style="font-size: 14px; ">Tổng giá trị đơn hàng <strong style="color: red">{{ number_format($data['hoadon']->tong_tien) }}đ</strong></p></li>
@endif --}}
@if ($data['voucher'])

    <li><p style="font-size: 14px; ">Tổng giá trị đơn hàng  <strong style="color: red"> <del>{{ number_format($data['hoadon']->tong_tien) }}đ </del></strong></p></li>
    <li><p style="font-size: 14px; ">Mã giảm giá <strong style="color: red">Có </strong></p></li>
    <li><p style="font-size: 14px; ">Còn lại <strong style="color: red">{{ number_format((($data['hoadon']->tong_tien) *($data['voucher']->gia_tri))/100) }} </strong></p></li>
@else
    <li><p style="font-size: 14px; ">Tổng giá trị đơn hàng <strong style="color: red">{{ number_format($data['hoadon']->tong_tien) }}đ</strong></p></li>
@endif
<hr>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1px">
    
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                
            </tr>
        </thead>
        
        <tbody>
            
            
            @foreach($data['donhang_ct'] as $dhct) 
            <tr>
                <td style="">{{ $loop->index }}</td>
                <td style="width:80px"><img src="{{url('/')}}/uploads/{{$dhct->anh_sp}}" alt="" width="80px" height="80px" border-radius="10px"></td>
                <td style="">{{$dhct->ten_sp}}</td>
                <td style="">{{ number_format($dhct->gia_sp) }}đ</td>
                <td style="">{{ number_format($dhct->so_luong) }}</td>
                <td style="">{{ number_format($dhct->tong_tien) }}đ</td>
                
                
            </tr>
            @endforeach
        
           
            
        </tbody>
    </table>
</div>
