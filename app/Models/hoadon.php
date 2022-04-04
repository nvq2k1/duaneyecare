<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    protected $table = 'hoa_don';
    protected $primaryKey = 'ma_hd';
    protected $fillable = ['ma_tv','dia_chi_nhan','sdt_nhan','email_nhan','ghichu_tv','ghichu_qt','ngay_gd','tong_tien','so_luong','anhien','trang_thai','trang_thai_tt'];
    public $timestamps = false;
}
