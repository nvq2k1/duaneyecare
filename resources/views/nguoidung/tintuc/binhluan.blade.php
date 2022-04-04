<div class="post-comment">
    <h3 class="post-title">Bình luận gần nhất</h3>
    @foreach($bl as $b)
    @php 
        $tv=$b->thanhvien;
    @endphp
    
    <div class="post-item">
        <div class="row align-items-center">
            <div class="col-1">
                @if($tv[0]->anh_dai_dien != null)
                <div class="img">
                    <img src="{{url('/')}}/uploads/{{$tv[0]->anh_dai_dien}}" alt="">
                </div>
                @else
                <div class="img">
                    <img src="../img/index/avatar.jpg" alt="">
                </div>
                @endif
            </div>
            <div class="col-11">
                <div class="content">
                    <div class="name">
                        {{ $tv[0]->ten_tv }}
                    </div>
                    <div class="text" id="sua_binhluan{{$b->ma_bl}}">
                        {{ $b->noi_dung }}
                    </div>
                    @php 
         
                    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
                    $time=$b->ngay_bl;
                    $time_ago =strtotime($time);
                    
                    @endphp
                    <div class="time">
                        @php 
                            echo time_stamp($time_ago);
                        @endphp
                        
                    </div>
                    @if(Auth::guard('thanhvien')->check())
                    @if($tv[0]->ma_tv == Auth::guard('thanhvien')->user()->ma_tv)
                    <div class="thaotac">
                        <a onclick="suabinhluan({{$b->ma_bl}})" href="javascript:">Chỉnh sửa</a> <a class="ml-3" onclick="xoa_bl({{$b->ma_bl}})" href="javascript:">Xóa</a>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<br>


<br><br>

