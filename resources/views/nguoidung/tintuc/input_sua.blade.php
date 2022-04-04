{{-- <form action="/luu-binh-luan/{{ $binhluan->ma_bl }}" method="post"> --}}
    @csrf
<input class="form-control" type="text" id="binh_luan_sua" value="{{ $binhluan->noi_dung }}">
<button onclick="luubinhluan({{$binhluan->ma_bl}})" href="javascript:"  class="mt-2 btn btn-primary">Lưu lại</button>
{{-- </form> --}}
{{-- <div class="thaotac1">
    <a  href="javascript:">Lưu</a> <a class="ml-3" href="">Hủy</a>
</div> --}}