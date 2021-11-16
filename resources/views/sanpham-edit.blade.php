@section('content')
    <h1>Cập nhật sản phẩm</h1>
    <form methot="POST" action="{{route('sanPham.update',['sanPham'=>$sanPham]}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for=""> Tên sản phẩm:</label>
            <input type="text" name="tensp" value="{{$sanPham->ten_san_pham}}"><br/>
            <label for="">Loại sản phẩm:</label>
            <select name="loaisp" id="">
                <option value="">Chọn loại</option>
                @foreach($lstLoai as $loai)
                <option value="{{$loai->id" @if($loai->id==$sanPham->loai_san_pham_id) selected @endif>
                    {{$loai->ten_loai_san_pham}}
                </option>
                @endforeach

            </select><br/>
            <label for="">Mô tả:</label>
            <textarea name="mota">{{$sanPham->mo_ta</textarea><br/>
                <label for="">Số lượng:</label>
                <input type="text" name="soluong" value="{{$sanPham->so_luong"><br/>
                <label for="">Gia</label>
                <input type="text" name="gia" value="{{$sanPham->gia"><br/>
                    <label for="">Hinh:</label><br/>
            <img style="width:100px;max-height:100px;object-fit:contain" src="{{$sanPham->hinh}}" alt="">
            <input type="file" accept="image/*" name="hinh"><br/>
            <input type="submit">
    </form>




@endsection