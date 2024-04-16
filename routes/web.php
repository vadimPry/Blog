
<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'Blog'], function () {
    // ** Main **
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [\App\Http\Controllers\Blog\Main\IndexController::class, '__invoke'])->name('main.index');
    });
    // ** Posts **
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', [\App\Http\Controllers\Blog\Post\IndexController::class, '__invoke'])->name('post.index');
        Route::get('/{post}', [\App\Http\Controllers\Blog\Post\ShowController::class, '__invoke'])->name('post.show');

        Route::group(['namespace' => 'Comment', 'prefix' => '/{post}/comment'], function(){
            Route::post('/', [\App\Http\Controllers\Blog\Post\Comment\StoreController::class, '__invoke'])->name('post.comment.store');
        });

        Route::group(['namespace' => 'Like', 'prefix' => '/{post}/like'], function(){
            Route::post('/', [\App\Http\Controllers\Blog\Post\Like\StoreController::class, '__invoke'])->name('post.like.store');
        });
    });
    // ** Category **
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/', [\App\Http\Controllers\Blog\Category\IndexController::class, '__invoke'])->name('category.index');

        Route::group(['namespace' => 'Post', 'prefix' => '{category}/post'], function(){
            Route::get('/', [\App\Http\Controllers\Blog\Category\Post\IndexController::class, '__invoke'])->name('category.post.index');
        });
    });
});

// ** Auth **
Route::get('/login', function () {
    return view('auth');
})->name('login');

// ** Personal **
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [\App\Http\Controllers\Personal\Main\IndexController::class, '__invoke'])->name('personal.main.index');
    });

    Route::group(['namespace' => 'liked', 'prefix' => 'liked'], function () {
        Route::get('/', [\App\Http\Controllers\Personal\Liked\IndexController::class, '__invoke'])->name('personal.liked.index');
        Route::delete('/{post}', [\App\Http\Controllers\Personal\Liked\DeleteController::class, '__invoke'])->name('personal.liked.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', [\App\Http\Controllers\Personal\Comment\IndexController::class, '__invoke'])->name('personal.comment.index');
        Route::get('/{comment}/edit', [\App\Http\Controllers\Personal\Comment\EditController::class, '__invoke'])->name('personal.comment.edit');
        Route::patch('/{comment}', [\App\Http\Controllers\Personal\Comment\UpdateController::class, '__invoke'])->name('personal.comment.update');
        Route::delete('/{comment}', [\App\Http\Controllers\Personal\Comment\DeleteController::class, '__invoke'])->name('personal.comment.delete');
    });
});
// ** Admin **
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'main'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Main\IndexController::class, '__invoke'])->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Post\CreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/', [\App\Http\Controllers\Admin\Post\StoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [\App\Http\Controllers\Admin\Post\ShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [\App\Http\Controllers\Admin\Post\EditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [\App\Http\Controllers\Admin\Post\UpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [\App\Http\Controllers\Admin\Post\DeleteController::class, '__invoke'])->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Category\IndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Category\CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [\App\Http\Controllers\Admin\Category\StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [\App\Http\Controllers\Admin\Category\ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [\App\Http\Controllers\Admin\Category\EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [\App\Http\Controllers\Admin\Category\UpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [\App\Http\Controllers\Admin\Category\DeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Tag\IndexController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [\App\Http\Controllers\Admin\Tag\CreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/', [\App\Http\Controllers\Admin\Tag\StoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [\App\Http\Controllers\Admin\Tag\ShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [\App\Http\Controllers\Admin\Tag\EditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [\App\Http\Controllers\Admin\Tag\UpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [\App\Http\Controllers\Admin\Tag\DeleteController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\User\IndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('/create', [\App\Http\Controllers\Admin\User\CreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('/', [\App\Http\Controllers\Admin\User\StoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/{user}', [\App\Http\Controllers\Admin\User\ShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('/{user}/edit', [\App\Http\Controllers\Admin\User\EditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [\App\Http\Controllers\Admin\User\UpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/{user}', [\App\Http\Controllers\Admin\User\DeleteController::class, '__invoke'])->name('admin.user.delete');
    });
});



//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
