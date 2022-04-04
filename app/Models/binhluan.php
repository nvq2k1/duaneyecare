<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    use HasFactory;
    protected $table = 'binh_luan';
    protected $primaryKey = 'ma_bl';
    protected $fillable = ['noi_dung','ma_tv','ma_tt','ma_sp','ngay_bl','anhien'];
    public $timestamps = false;

    
    public function binhluan()
    {
        return $this->belongsTo(\App\Models\binhluan::class, 'ma_tv');
    }
    public function thanhvien() 
    {
        return $this-> hasMany(\App\Models\thanhvien::class, 'ma_tv','ma_tv');
    }
    
}
