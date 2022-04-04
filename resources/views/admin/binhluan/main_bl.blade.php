<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Nội dung </th>
                <th>Người bình luận </th>
                <th>Thời gian</th>
                <th>Bình luận tại</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>Nội dung </th>
                <th>Người bình luận </th>
                <th>Thời gian</th>
                <th>Bình luận tại</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
        <tbody>
            
        @foreach($list_bl as $bl)
        @php 
            $tv=$bl->thanhvien;
        @endphp
          <tr>
              <td>#{{$bl->ma_bl}}</td>
              <td>{{$bl->noi_dung}}</td>
              <td>{{$tv[0]->ten_tv}}</td>
              <td>
                @php
                $date=date_create("$bl->ngay_bl");
                echo date_format($date,"d-m-Y H:i:s"); 
                @endphp
                </td>
              
              <td>
                  @if($bl->ma_tt==null)
                        <a href="/chi-tiet-san-pham/{{ $bl->ma_sp }}">Sản phấm #{{ $bl->ma_sp }}</a>
                  @else
                        <a href="/xem-bai-viet/{{ $bl->ma_tt }}">Bài viết #{{ $bl->ma_tt}}</a>
                  @endif
            
                </td>
              <td >
              {{-- @if($bl->anhien==1)     <span class="badge badge-success">Đang hiện</span> @endif 
                    @if($bl->anhien==0)     <span class="badge badge-danger">Đang ẩn</span> @endif  --}}

                    <label class="switch">
                        <input type="checkbox" id="anhien"  onclick="anhien()" value="1"> 
                        <span class="slider round"></span>
                    </label>
            </td>
              <td style="width:100px">
              
              <a  onclick="xoa_bl({{$bl->ma_bl}})" href="javascript:"><i class='fas fa-trash-alt' style='font-size:24px'></i></a>
              
              </td>
          </tr>
        @endforeach
        </tbody>
    </table>
</div>