<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class thanhvien extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'thanh_vien';
    protected $primaryKey = 'ma_tv';
    protected $fillable = [
        'tai_khoan',
        'password',
        'anh_dai_dien',
        'email',
        'ten_tv',
        'sodienthoai',
        'diachi',
        'trang_thai',
    ];
    public $timestamps = false;

    public function thanhvien()
    {
        return $this->belongsTo(\App\Models\thanhvien::class, 'ma_tv');
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
