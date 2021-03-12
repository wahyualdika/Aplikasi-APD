<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\AdminAuthentication\AdminAuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\ExportExcelController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

#these are routes that handle authentication logic
#like email verification and password reset
#starting here
Route::get('/email/verify', function () {
    return view('authentication.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    $request->session()->regenerate();
    return redirect('/user');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', function () {
    return view('authentication.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with('succsess', 'Link reset password telah dikirim, periksa email')
                : back()->with('fail', 'Email tidak terdaftar');
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('authentication.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();

            $user->setRememberToken(Str::random(60));

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
#end here



Route::get('/login', [AuthController::class, 'getLoginPage'])->name('login.page');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/register',[AuthController::class,'getRegisterPage'])->name('register.page')->middleware('checkIfRegistered');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/user',[UserController::class,'userPage'])->name('user_page')->middleware('verified');
Route::get('/user/{id}',[UserController::class,'editFileForm'])->name('edit_profile_form')->middleware('verified');
Route::put('/user/{id}',[UserController::class,'editProfile'])->name('edit_profile')->middleware('verified');
Route::get('/user/{id}/orders',[UserController::class,'orderList'])->name('user_orders_list')->middleware('verified');
Route::post('/product/order/{id}',[UserController::class,'order'])->name('order_product')->middleware('verified');
Route::get('/user/order/{id}/detail',[UserController::class,'orderDetail'])->name('order_detail')->middleware('verified');
Route::post('/user/order/{id}/cancel',[UserController::class,'orderCancel'])->name('order_cancel')->middleware('verified');

Route::get('/',[FrontPageController::class,'welcome'])->name('home');
Route::get('/products',[FrontPageController::class,'products'])->name('product_page');

Route::get('/admin/login', [AdminAuthController::class, 'getLoginPage'])->name('admin.login.page');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/{id}/formEdit', [AdminController::class, 'formEditAdmin'])->name('admin.form.edit');
Route::put('/admin/{id}/edit', [AdminController::class, 'editAdmin'])->name('admin.edit');
Route::get('/admin/form', [AdminController::class, 'addAdminForm'])->name('admin.form');
Route::post('/admin/form', [AdminController::class, 'addAdmin'])->name('admin.submit');
Route::get('/admins', [AdminController::class, 'allAdmin'])->name('admin.all');
Route::get('/admin/home', [AdminController::class, 'homeAdmin'])->name('admin.home');
Route::get('/admin/products/list', [AdminController::class, 'listProduct'])->name('admin.product.list');
Route::get('/admin/product/form/',[AdminController::class,'formInputProduct'])->name('admin.product.form');
Route::get('/admin/product/{id}',[AdminController::class,'formUpdateProduct'])->name('admin.product.update_form');
Route::post('/admin/product/{id}',[AdminController::class,'updateProduct'])->name('admin.product.update');
Route::post('/admin/products/submit',[AdminController::class,'submitProduct'])->name('admin.product.submit');
Route::post('/admin/products/delete/{id}',[AdminController::class,'deleteProduct'])->name('admin.product.delete');
Route::get('/admin/users/list',[AdminController::class,'usersList'])->name('admin.users.list');
Route::get('/admin/user/{id}/orders',[AdminController::class,'userOrders'])->name('admin.user.orders');
Route::get('/admin/orders/list',[AdminController::class,'ordersList'])->name('admin.orders.list');

Route::get('/admin/export/orders', [ExportExcelController::class,'exportOrderAll'])->name('admin.export.orders');
Route::get('/admin/export/user/orders/{id}',[ExportExcelController::class,'exportUserOrder'])->name('admin.export.user.orders');
Route::get('/admin/export/user/{id}/orders',[ExportExcelController::class,'exportAllUserOrder'])->name('admin.export.user.orders.all');
