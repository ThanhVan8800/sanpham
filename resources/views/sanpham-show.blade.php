@section('content')
<h1>Chi tiết sản phẩm</h1>
<a href="{{route('sanPham.edit',['sanPham'=>$sanPham])}}">Sửa</a>
<form action="{{route('sanPham.destroy',['sanPham'=>$sanPham])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Xóa</button>

</form>
<label for="">Tên sản phẩm:</label>{{$sanPham->ten_san_pham}}<br/>
<label for="">Loại sản phẩm:</label>{{$sanPham->ten_loai_san_pham}}<br/>
<label for="">Mô tả</label>
<p>{{$sanPham->mo_ta}}</p>
    <label for="">Số lượng:</label>{{$sanPham->so_luong}}<br/>
    <label for="">Giá:</label>{{$sanPham->gia}}<br/>
    <label for="">Hình:</label><br/>
    <img style="width:100px;max-height:100px;object-fit:contain" src="{{$sanPham->hinh}}" alt="">
@endsection