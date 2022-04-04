<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ControllerLoaisp;
use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TintucController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\HoadonController;
use App\Http\Controllers\ThanhvienController;
//route admin
//admin
Route::get('/admin', [ControllerAdmin::class, 'index'])->name('admin');
Route::get('/admin/login', [ControllerAdmin::class, 'login_ad'])->name('login_ad');
Route::post('/admin/login', [ControllerAdmin::class, 'login_ad_db']);
Route::get('/admin/logout', [ControllerAdmin::class, 'logout_ad']);
Route::get('/admin/danh-sach-loai-san-pham', [ControllerAdmin::class, 'loaisp'])->name('ds_loaisp');
Route::get('/admin/danh-sach-san-pham', [SanphamController::class, 'index'])->name('ds_sp');
//Route::get('/admin/them-loai-san-pham', [ControllerLoaisp::class, 'them_loaisp']);

//route tuy bien banner
Route::get('/admin/tuy-chinh-banner', [BannerController::class, 'index'])->name('banner');
Route::get('/admin/thu-vien-anh', [BannerController::class, 'thuvien_anh']);
Route::post('/admin/chon-anh', [BannerController::class, 'chon_anh']);
Route::post('/admin/tuy-chinh-banner', [BannerController::class, 'sua_banner_db']);
//route loai san pham
Route::post('/admin/them-loai-san-pham', [ControllerLoaisp::class, 'them_loaisp_db']);
Route::get('/admin/sua-loai-san-pham/{id}', [ControllerLoaisp::class, 'sua_loaisp']);
Route::post('/admin/sua-loai-san-pham/{id}', [ControllerLoaisp::class, 'sua_loaisp_db']);
Route::get('/admin/xoa-loai-san-pham/{id}', [ControllerLoaisp::class, 'xoa_loaisp']);
Route::get('/admin/xoa-loai-san-pham-modal/{id}', [ControllerLoaisp::class, 'xoa_loaisp_modal']);
Route::get('/admin/sua-loai-san-pham-modal/{id}', [ControllerLoaisp::class, 'sua_loaisp']);
//route san pham
Route::post('/admin/them-san-pham', [SanphamController::class, 'them_sp']);
Route::get('/admin/sua-san-pham-modal/{id}', [SanphamController::class, 'sua_sanpham']);
Route::post('/admin/sua-san-pham/{id}', [SanphamController::class, 'sua_sanpham_db']);
Route::get('/admin/xoa-san-pham-modal/{id}', [SanphamController::class, 'xoa_sp_modal']);
Route::get('/admin/xoa-san-pham/{id}', [SanphamController::class, 'xoa_sp']);
//route tin tuc
Route::get('/admin/danh-sach-tin-tuc', [TintucController::class, 'index'])->name('tin_tuc');
Route::get('/admin/them-tin-tuc', [TintucController::class, 'them_tin']);
Route::post('/admin/them-tin-tuc', [TintucController::class, 'them_tin_db']);

//binhluan
Route::get('/admin/danh-sach-binh-luan', [BinhluanController::class, 'ds_binhluan'])->name('ds_binhluan');
Route::get('/admin/xoa-binh-luan-modal/{id}', [BinhluanController::class, 'xoa_bl_modal']);
Route::get('/admin/xoa-binh-luan/{id}', [BinhluanController::class, 'xoa_bl_db']);
Route::get('/admin/hien-binh-luan/{id}', [BinhluanController::class, 'hien']);
Route::get('/admin/an-binh-luan/{id}', [BinhluanController::class, 'an']);

Route::get('/admin/sua-tin-tuc/{id}', [TintucController::class, 'sua_tin']);
Route::post('/admin/sua-tin-tuc/{id}', [TintucController::class, 'sua_tin_db']);

Route::get('/admin/xoa-tin-tuc-modal/{id}', [TintucController::class, 'xoa_tin_modal']);
Route::get('/admin/xoa-tin-tuc/{id}', [TintucController::class, 'xoa_tin']);
// quan li hoa don

Route::get('/admin/danh-sach-hoa-don', [HoadonController::class, 'index'])->name('ds_hoadon');
Route::get('/admin/don-hang-chi-tiet/{id}', [HoadonController::class, 'xemchitiet_dh']);
Route::get('/admin/duyet-don-hang-modal/{id}', [HoadonController::class, 'duyetdon_modal']);
Route::get('/admin/duyet-don-hang-db/{id}', [HoadonController::class, 'duyetdon_db']);
//voucher
Route::get('/admin/danh-sach-voucher', [VoucherController::class, 'index'])->name('ds_voucher');
Route::post('/admin/them-voucher', [VoucherController::class, 'them_voucher']);
Route::get('/admin/sua-voucher-modal/{id}', [VoucherController::class, 'sua_voucher_modal']);
Route::post('/admin/sua-voucher-db/{id}', [VoucherController::class, 'sua_voucher_db']);
Route::get('/admin/xoa-voucher-modal/{id}', [VoucherController::class, 'xoa_voucher_modal']);
Route::get('/admin/xoa-voucher/{id}', [VoucherController::class, 'xoa_voucher']);

// quan ly thanh vien
Route::get('/admin/danh-sach-thanh-vien', [ThanhvienController::class, 'index'])->name('ds_tv');
Route::get('/admin/xem-thanh-vien/{id}', [ThanhvienController::class, 'xem_tv']);
Route::get('/admin/khoa-thanh-vien-modal/{id}', [ThanhvienController::class, 'khoa_tv_modal']);
Route::get('/admin/thay-doi-trang-thai-thanh-vien/{id}', [ThanhvienController::class, 'khoa_mo_tv']);
//route nguoi dung
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/san-pham', [SanphamController::class, 'sanpham'])->name('sanpham');
Route::get('/lien-he', [HomeController::class, 'lienhe'])->name('lienhe');
Route::get('/gioi-thieu', [HomeController::class, 'gioithieu'])->name('gioithieu');
Route::get('/tin-tuc', [HomeController::class, 'tintuc']);
Route::get('/ho-tro', [HomeController::class, 'support']);
Route::post('/gui-mail-lien-he', [HomeController::class, 'maillienhe']);
Route::get('/chi-tiet-san-pham/{id}', [HomeController::class, 'xemsanpham']);
Route::get('/loai-san-pham/{id}', [HomeController::class, 'loaisanpham']);
Route::get('/xem-bai-viet/{id}', [TintucController::class, 'xemtin']);
Route::get('/binh-luan-tin/{id}/{ma_tv}/{noidung}', [BinhluanController::class, 'binhluan_tin'])->name('bl_tin');
Route::get('/sua-binh-luan/{id}', [BinhluanController::class, 'sua_binhluan']);
Route::get('/luu-binh-luan/{id}/{text}/{ma_tt}', [BinhluanController::class, 'luu_binhluan']);
Route::get('/xoa-binh-luan-modal/{id}', [BinhluanController::class, 'xoa_binhluan_modal']);
Route::get('/xoa-binh-luan-user/{id}', [BinhluanController::class, 'xoa_binhluan']);
Route::get('/binh-luan-san-pham/{id}/{ma_tv}/{noidung}', [BinhluanController::class, 'binhluan_sp'])->name('bl_sp');
Route::get('/sua-binh-luan-san-pham/{id}', [BinhluanController::class, 'sua_binhluan_sp']);
Route::get('/luu-binh-luan-san-pham/{id}/{text}/{ma_sp}', [BinhluanController::class, 'luu_binhluan_sp']);
//cart
Route::get('/Addcart/{id}', [CartController::class, 'add_cart']);
Route::get('/Addcarts/{id}/{soluong}', [CartController::class, 'add_carts']);
Route::get('/cart', [CartController::class, 'xem_cart'])->name('cart');
Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart']);
Route::get('/delete_cart1/{id}', [CartController::class, 'delete_cart1']);
Route::get('/save-cart/{id}/{quanty}', [CartController::class, 'save_cart']);
Route::get('/check-out', [CartController::class, 'checkout'])->name('checkout');

//loc san pham
Route::get('/loc-gia-san-pham/{min}/{max}/{tt}/{ma_loai}', [SanphamController::class, 'loc_gia']);
Route::get('/san-pham-danh-muc/{id}/{min}/{max}', [SanphamController::class, 'sp_danhmuc']);
Route::get('/san-pham-danh-muc/{id}', [SanphamController::class, 'sp_dm']);

//tim kiem
Route::post('/tim-kiem', [HomeController::class, 'timkiem'])->name('timkiem');



//dang nhap dang ky
Route::get('/dang-nhap', [LoginController::class,'dangnhap'])->name('dangnhap');
Route::post('/dang-nhap', [LoginController::class,'dangnhap_db']);
Route::get('/dang-ky', [LoginController::class,'dangky'])->name('dangky');
Route::post('/dang-ky', [LoginController::class,'dangky_db']);

//vn pay
Route::post('/xac-nhan-thanh-toan', [CheckoutController::class,'xacnhan_vnpay'])->name('vn_pay');
Route::post('/vn-pay', [CheckoutController::class,'vnpay']);
Route::get('/vnpay-return', [CheckoutController::class,'vnpayReturn']);

//dathang
Route::post('/dat-hang-chua-thanh-toan', [CheckoutController::class,'order_after']);

//DATHANG
Route::post('/dat-hang', [CheckoutController::class,'order']);
Route::get('/ma-giam-gia/{ma_gg}', [CheckoutController::class,'voucher']);

//user
Route::get('/xem-don-hang', [LoginController::class,'xemdonhang']);
Route::get('/dang-xuat', [LoginController::class,'dangxuat']);
Route::get('/xem-don-hang-chi-tiet/{id}', [LoginController::class,'xemdonhang_ct']);

//capnhat thong tin kh
Route::get('/cap-nhat-thong-tin', [LoginController::class,'capnhat_tt'])->name('taikhoan');
Route::post('/cap-nhat-thong-tin-db', [LoginController::class,'capnhat_tt_db']);
Route::get('/doi-mat-khau', [LoginController::class,'doimatkhau'])->name('doimatkhau');
Route::post('/doi-mat-khau-db', [LoginController::class,'doimatkhau_db']);
Route::get('/quen-mat-khau', [LoginController::class,'quenmatkhau'])->name('quenmatkhau');
Route::post('/xac-nhan-email', [LoginController::class,'xacnhan_email']);

