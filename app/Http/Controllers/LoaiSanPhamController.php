<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiSanPham $loaiSanPham)
    // public function show($id)
     {
        //$loai = DB::table('loai_san_phams')->where('id', '=', $id)->first();
         $lstSanPham = SanPham::where('loai_san_pham_id', '=' , $loaiSanPham->id)->get();
        return view('loai',
        [
            'loai'=> $loaiSanPham,
            'lstSanPham'=>$loaiSanPham ->sanPhams 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(LoaiSanPham $loaiSanPham)
    {
        // $loai = DB::table('loai_san_phams')->where('id', '=', $id)->first();
        // $chitiet=DB::table('san_phams')->where('id', '=', $id)->first();
        // $SanPham = SanPham::where('id','=',$SanPham->id)->get();
        // return view('sanpham',
        // [
        //    // 'loai'=> $loai,
        //     'lstSanPham'=>$SanPham
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoaiSanPham $loaiSanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoaiSanPham $loaiSanPham)
    {
        //
    }
}
