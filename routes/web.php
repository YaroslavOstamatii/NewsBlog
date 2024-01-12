<?php


use App\Http\Controllers\Admin\News\NewsActiveController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', IndexController::class)->name('main');

Route::resource('news', NewsController::class )->middleware('auth');
Route::resource('newsActive', NewsActiveController::class )->middleware('auth');


Route::prefix('personal')->middleware(['auth'])->name('personal.')
    ->namespace('App\Http\Controllers\Personal')->group(function () {

        Route::get('/', 'Main\IndexController')->name('main.index');
        Route::get('/like', 'Like\IndexController')->name('liked.index');
        Route::delete('/{post}}', 'Like\DestroyController')->name('liked.destroy');
        Route::resource('comment', CommentController::class );
//        Route::get('/comment', 'Comment\IndexController')->name('comment.index');
//        Route::get('/{comment}/edit', 'Comment\EditController')->name('comment.edit');
//        Route::put('/{comment}', 'Comment\UpdateController')->name('comment.update');
//        Route::delete('/{comment}', 'Comment\DestroyController')->name('comment.destroy');
    });

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', IndexController::class)->name('admin.main');

});

Route::prefix('admin/user')->namespace('App\Http\Controllers\Admin\User')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'IndexController')->name('admin.user.index');
    Route::get('/create', 'CreateController')->name('admin.user.create');
    Route::post('/', 'StoreController')->name('admin.user.store');
    Route::get('/{id}', 'ShowController')->name('admin.user.show');
    Route::get('/{id}/edit', 'EditController')->name('admin.user.edit');
    Route::put('/{id}', 'UpdateController')->name('admin.user.update');
    Route::delete('/{id}', 'DestroyController')->name('admin.user.destroy');
});

Route::prefix('admin/post')->namespace('App\Http\Controllers\Admin\Post')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'IndexController')->name('admin.post.index');
    Route::get('/create', 'CreateController')->name('admin.post.create');
    Route::post('/', 'StoreController')->name('admin.post.store');
    Route::get('/{id}', 'ShowController')->name('admin.post.show');
    Route::get('/{id}/edit', 'EditController')->name('admin.post.edit');
    Route::patch('/{id}', 'UpdateController')->name('admin.post.update');
    Route::delete('/{id}', 'DestroyController')->name('admin.post.destroy');
});

Route::prefix('admin/category')->namespace('App\Http\Controllers\Admin\Category')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'IndexController')->name('admin.category.index');
    Route::get('/create', 'CreateController')->name('admin.category.create');
    Route::post('/', 'StoreController')->name('admin.category.store');
    Route::get('/{id}', 'ShowController')->name('admin.category.show');
    Route::get('/{id}/edit', 'EditController')->name('admin.category.edit');
    Route::put('/{id}', 'UpdateController')->name('admin.category.update');
    Route::delete('/{id}', 'DestroyController')->name('admin.category.destroy');
});

Route::prefix('admin/tag')->namespace('App\Http\Controllers\Admin\Tag')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'IndexController')->name('admin.tag.index');
    Route::get('/create', 'CreateController')->name('admin.tag.create');
    Route::post('/', 'StoreController')->name('admin.tag.store');
    Route::get('/{id}', 'ShowController')->name('admin.tag.show');
    Route::get('/{id}/edit', 'EditController')->name('admin.tag.edit');
    Route::put('/{id}', 'UpdateController')->name('admin.tag.update');
    Route::delete('/{id}', 'DestroyController')->name('admin.tag.destroy');
});


//
//Route::prefix('admin*')->namespace('\App\Http\Controllers\Admin\Main')->group(function () {
//    Route::get('/', IndexController::class);
//
//    Route::prefix('admin')->group(function () {
//        Route::get('/', IndexController::class);
//    });
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
