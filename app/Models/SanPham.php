<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use HasFactory;
    use SoftDeletes; //thêm chức năng xóa mềm
    protected $guarded = [];
    public function LoaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class);
    }
}
