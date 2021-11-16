<?php

namespace App\Http\Controllers;
// thêm use để thực hiện chức năng xóa, sửa, thêm
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lstSanPham = SanPham::all();
        foreach($lstSanPham as $sp)
        {
            $this->fixImage($sp);
            // gọi fixImage    cho từng sp, do lúc seed chỉ có dữ liệu giả
        }
        return view('sanpham_index',['lstSanPham'=>$lstSanPham]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lstLoai = LoaiSanPham::all();
        return view('sanpham-create',['lstLoai'=>$lstLoai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sanPham= new SanPham;
        $sanPham->fill([
            'ten_san_pham'=>$request->input('tensp'),
            'mo_ta'=>$request->input('mota'),
            'so_luong'=>$request->input('soluong'),
            'gia'=>$request->input('gia'),
            'hinh'=>'',
            'Loai_san_pham_id'=>$request->input('loaisp')
        ]);
        $sanPham->save();
        if($request->hasFile('hinh')){
            $sanPham->hinh = $request->file('hinh')->store('image/sp/'.$sanPham->id,'public');
        }
        $sanPham->save();
        return redirect::route('sanPham.show',['sanPham'=>$sanPham]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    //phương thức load ảnh và tự động load ảnh nếu không tìm thấy file
    protected function fixImage(SanPham $sanPham)
    {

        if(Storage::disk('public')->exists($sanPham->hinh))
        {
            $sanPham->hinh = Storage::url($sanPham->hinh);
        }else{
            $sanPham->hinh = '/img/no_image_placehodder.png';
        }
    }
    public function show(SanPham $sanPham)
    {
      
        // $loai = DB::table('loai_san_phams')->where('id', '=', $id)->first();
        // $chitiet=DB::table('san_phams')->where('id', '=', $id)->first();
        // $SanPham = SanPham::where('id','=',$sanPham->id)->get();
        // return view('sanpham',
        // [
        //    // 'loai'=> $loai,
        //     'lstSanPham'=>$SanPham
        // ]);
        $this->fixImage($sanPham);
        return view('sanpham-show',['sanPham'=>$sanPham]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanPham)
    {
        //
        $this->fixImage($sanPham);
        $lstLoai = LoaiSanPham::all();
        return view('sanpham-edit',['sanPham'=>$sanPham,'LoaiSanPham'=>$lstLoai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanPham $sanPham)
    {
        //
        if($request->hasFile('hinh')){
            $sanPham->hinh = $request->file('hinh')->store('image/sp/'.$sanPham->id,'public');

        }
        $sanPham->fill([
            'ten_san_pham'=>$request->input('tensp'),
            'mo_ta'=>$request->input('mota'),
            'so_luong'=>$request->input('soluong'),
            'gia'=>$request->input('gia'),
            'Loai_san_pham_id'=>$request->input('loaisp')
        ]);
        $sanPham->save();
        return Redirect::route('sanPham.show',['sanPham'=>$sanPham]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanPham)
    {
        //
        $sanPham->delete();
        return redirect::route('sanPham.index');
    }
}
