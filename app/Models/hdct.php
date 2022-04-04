<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hdct extends Model
{
    use HasFactory;
    protected $table = 'hoa_don_ct';
    protected $primaryKey = 'ma_hdct';
    protected $fillable = ['ma_sp','ma_hd','ten_sp','anh_sp','gia_sp','tong_tien','so_luong'];
    public $timestamps = false;
}
