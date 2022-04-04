
<div class="modal fade" id="thuvien_anh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" onclick="tat_modal()"  aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <form action="/admin/chon-anh" method="post">
            <ul>
                    @csrf
                    @foreach($list_anh as $l)
                    <li>
                    <input type="checkbox" id="myCheckbox{{ $l->id }}" name="banner[]" value="{{ $l->id }}" @if($l->trang_thai==1)checked @endif />
                    <label for="myCheckbox{{ $l->id }}"><img src="{{ url('/') }}/uploads/{{$l->anh_banner}}" /></label>
                    </li>
                    @endforeach
                
            </ul>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="tat_modal()"  data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary" >Chắc chắn</button>
                
            </div>
            </form>
        </div>
        
        </div>

    </div>
    </div>


  <style>
  ul {
    list-style-type: none;
  }
  
  li {
    display: inline-block;
  }
  
  input[type="checkbox"][id^="myCheckbox"] {
    display: none;
  }
  
  label {
    border: 1px solid #fff;
    padding: 10px;
    display: block;
    position: relative;
    margin: 10px;
    cursor: pointer;
  }
  
  label:before {
    background-color: white;
    color: white;
    content: " ";
    display: block;
    border-radius: 50%;
    border: 1px solid grey;
    position: absolute;
    top: -5px;
    left: -5px;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 28px;
    transition-duration: 0.4s;
    transform: scale(0);
  }
  
  label img {
    height: 100px;
    width: 100px;
    transition-duration: 0.2s;
    transform-origin: 50% 50%;
  }
  
  :checked + label {
    border-color: #ddd;
  }
  
  :checked + label:before {
    content: "✓";
    background-color: #28a745;
    transform: scale(1);
  }
  
  :checked + label img {
    transform: scale(0.9);
    /* box-shadow: 0 0 5px #333; */
    z-index: -1;
  }</style>