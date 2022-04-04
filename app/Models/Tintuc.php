<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    use HasFactory;
    protected $table = 'tin_tuc';
    protected $primaryKey = 'ma_tt';
    protected $fillable = ['hinh_anh','mo_ta','noi_dung','luot_xem','ngay_dang','nguoi_dang','tieu_de','anhien'];
    public $timestamps = false;

    public function binhluan() 
    {
        return $this-> hasMany(\App\Models\binhluan::class, 'ma_tt','ma_tt');
    }
    public function admin() 
    {
        return $this-> hasOne(\App\Models\admin::class, 'ma_qt','nguoi_dang');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($binhluan) { // before delete() method call this
             $binhluan->binhluan()->delete();
             // do the rest of the cleanup...
        });
    }
}
