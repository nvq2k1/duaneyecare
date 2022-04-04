<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    protected $table = 'ma_giam_gia';
    protected $primaryKey = 'ma_gg';
    protected $fillable = ['ten_gg','gia_tri','so_luong','ngay_tao','ngay_het_han'];
    public $timestamps = false;
}