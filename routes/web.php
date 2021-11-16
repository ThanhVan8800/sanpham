<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
//Route::get('/loai/{id}',[LoaiSanPham::class,'show']);
// Route::get('/loai/{loaiSanPham}',[LoaiSanPham::class,'show']);
// Route::get('/loai/{loaiSanPham}',[LoaiSanPhamController::class,'show']);
// Route::get('/loai/sanpham/{SanPham}',[LoaiSanPhamController::class,'edit']);
// SỬ DỤNG RESOURCE GỒM CÁC INDEX, SHOW , EDIT
Route::resource('loaiSanPham',LoaiSanPhamController::class);// khoong co' []
Route::resource('sanPham',SanPhamController::class);
