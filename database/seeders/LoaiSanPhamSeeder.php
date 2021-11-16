<?php

namespace Database\Seeders;
use App\Models\LoaiSanPham;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;// thêm dòng này để xử lý dữ liệu

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nhập dữ liệu giả 
        
        for($i = 1; $i<=5;$i++)
        {
        //cách 1:
        //create: new + fill + save
        $loai = new LoaiSanPham;
        $loai->fill(
            [
             'ten_loai_san_pham'=>'Loại sản phẩm'.$i

            ]);
        $loai->save();
        //Cách 2: trong model phải có $fillable hoặc $guarded = []
        // LoaiSanPham::create([
        //     'ten_loai_san_pham'=>'Loại sản phẩm'.$i
            
        // ]);
        // khi không có sử dụng model
        // DB::table('loai_san_phams')->insert([
        //     'ten_loai_san_pham'=>'Loại sản phẩm'.$i;
        // ])
        }
    }
}
