@section('content')
<h1>Danh sách sản phẩm</h1>
<a href="{{route('sanPham.create'}}">Thêm</a><br/>
@foreach($lstSanPham as $sp)
{
    <img src="{{$sp->hinh}}" alt="">
    <a href="{{route('sanPham.show',['sanPham'=>$sp]}}">{{$sp->ten_san_pham}}</a>
    <a href="{{route('sanPham.edit',['sanPham'=>$sp])}}">Sửa</a>

}
@endforeach
@endsection