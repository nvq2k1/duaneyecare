<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{   
    
    use HasFactory;
    protected $table = 'san_pham';
    protected $primaryKey = 'ma_sp';
    protected $fillable = ['ma_loai','ten_sp','giacu_sp','giamoi_sp','mota_sp','anh_sp','ds_anh','thoidiemtao','anhien','luot_xem','luot_ban','sl_trong_kho','trangthai_sp'];
    public $timestamps = false;

    public function ds_anh() 
    {
        return $this-> hasMany(\App\Models\ds_anh::class, 'ma_sp', 'ma_sp');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($ds_anh) { // before delete() method call this
             $ds_anh->ds_anh()->delete();
             // do the rest of the cleanup...
        });
    }

    
    
}


