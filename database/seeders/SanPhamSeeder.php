<?php

namespace Database\Seeders;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //như loai_san_phams nhưng có khóa ngoại

        for($i = 1; $i <= 50; $i++)
        {
            $sanpham = new SanPham;
            $sanpham->fill(
                [
                    'ten_san_pham'=>'Sản phẩm'.$i,
                    'mo_ta'=>'Mô tả sản phẩm'.$i,
                    'so_luong'=>$i*2,
                    'gia'=>$i*10000,
                    'hinh'=>$i. '.png',
                    'loai_san_pham_id' => ($i-1)%5+1
                ]
            );
            $sanpham->save();
            // DB::table('san_phams')->insert([
            //     'ten_san_pham'=>'Sản phẩm'.$i,
            //     'mo_ta'=>'Mô tả sản phẩm'.$i,
            //     'so_luong'=>$i*2,
            //     'gia'=>$i*10000,
            //     'hinh'=>$i. '.png',
            //     'loai_san_pham_id' => ($i-1)%5+1// chia lấy dư trừ bớt, thêm để có id
            // ]);
        }

    }
}
