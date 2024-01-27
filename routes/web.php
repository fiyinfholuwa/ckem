<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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


Route::get('/redirect', [AuthController::class, 'check_login'])->middleware(['auth', 'verified'])->name('redirect');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/branch/dashboard', [AuthController::class, 'branch_dashboard'])->middleware(['auth', 'verified'])->name('branch.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/admin/testimonial/view', 'testimonial_view')->name('testimonial.view');
        Route::get('/admin/testimonial/all', 'testimonial_all')->name('testimonial.all');
        Route::post('/admin/testimonial/add', 'testimonial_add')->name('testimonial.add');
        Route::post('/admin/testimonial/delete/{id}', 'testimonial_delete')->name('testimonial.delete');
        Route::get('/admin/testimonial/edit/{id}', 'testimonial_edit')->name('testimonial.edit');
        Route::post('/admin/testimonial/update/{id}', 'testimonial_update')->name('testimonial.update');
    });

    Route::controller(AboutController::class)->group(function () {
        Route::get('/about', 'about')->name('about');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/projects', 'project')->name('project');
        Route::get('/admin/project/view', 'project_view')->name('project.view');
        Route::get('/admin/project/all', 'project_all')->name('project.all');
        Route::post('/admin/project/add', 'project_add')->name('project.add');
        Route::post('/admin/project/delete/{id}', 'project_delete')->name('project.delete');
        Route::get('/admin/project/edit/{id}', 'project_edit')->name('project.edit');
        Route::post('/admin/project/update/{id}', 'project_update')->name('project.update');
        Route::get('project/details/{id}', 'project_detail')->name('project.detail');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'product')->name('product');
        Route::get('/admin/product/view', 'product_view')->name('product.view');
        Route::get('/admin/product/all', 'product_all')->name('product.all');
        Route::post('/admin/product/add', 'product_add')->name('product.add');
        Route::post('/admin/product/delete/{id}', 'product_delete')->name('product.delete');
        Route::get('/admin/product/edit/{id}', 'product_edit')->name('product.edit');
        Route::post('/admin/product/update/{id}', 'product_update')->name('product.update');
        Route::get('product/details/{name}', 'product_detail')->name('product.detail');
    });


    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'all_blog')->name('blog');
        Route::get('/admin/category/manage', 'category_view')->name('category.view');
        Route::post('/admin/category/add', 'category_add')->name('category.add');
        Route::post('/admin/category/delete/{id}', 'category_delete')->name('category.delete');
        Route::get('/admin/category/edit/{id}', 'category_edit')->name('category.edit');
        Route::post('/admin/category/update/{id}', 'category_update')->name('category.update');
        Route::get('/admin/post/view', 'post_view')->name('post.view');
        Route::get('/admin/post/all', 'post_all')->name('post.all');
        Route::post('/admin/post/add', 'post_add')->name('post.add');
        Route::post('/admin/post/delete/{id}', 'post_delete')->name('post.delete');
        Route::get('/admin/post/edit/{id}', 'post_edit')->name('post.edit');
        Route::post('/admin/post/update/{id}', 'post_update')->name('post.update');
        Route::get('/blog/{name}', 'post_detail')->name('blog.detail');
        Route::get('/blog/category/{name}', 'post_category')->name('blog.category');
        Route::post('/comment/add', 'comment_add')->name('comment.save');
        Route::get('/admin/comment/all', 'get_all_comment')->name('comment.all');
        Route::post('/admin/comment/delete/{id}', 'comment_delete')->name('comment.delete');
    });

    Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact/save', 'contact_save')->name('contact.save');
        Route::get('/admin/contact/all', 'get_all_message')->name('contact.all');
        Route::post('/admin/contact/delete/{id}', 'message_delete')->name('contact.delete');
        Route::get('/admin/contact/all', 'get_all_message')->name('contact.all');

        Route::get('/admin/branch/view', 'branch_view')->name('branch.view');
        Route::post('/admin/branch/add', 'branch_add')->name('branch.add');
        Route::get('/admin/branch/all', 'branch_all')->name('branch.all');
        Route::post('/admin/branch/delete/{id}', 'branch_delete')->name('branch.delete');
        Route::get('/admin/branch/edit/{id}', 'branch_edit')->name('branch.edit');
        Route::post('/admin/branch/update/{id}', 'branch_update')->name('branch.update');

        Route::get('/admin/event/view', 'event_view')->name('event.view');
        Route::get('/admin/event/all', 'event_all')->name('event.all');
        Route::post('/admin/event/add', 'event_add')->name('event.add');
        Route::post('/admin/event/delete/{id}', 'event_delete')->name('event.delete');
        Route::get('/admin/event/edit/{id}', 'event_edit')->name('event.edit');
        Route::post('/admin/event/update/{id}', 'event_update')->name('event.update');

        Route::get('/admin/pastor/view', 'pastor_view')->name('pastor.view');
        Route::get('/admin/pastor/all', 'pastor_all')->name('pastor.all');
        Route::post('/admin/pastor/add', 'pastor_add')->name('pastor.add');
        Route::post('/admin/pastor/delete/{id}', 'pastor_delete')->name('pastor.delete');
        Route::get('/admin/pastor/edit/{id}', 'pastor_edit')->name('pastor.edit');
        Route::post('/admin/pastor/update/{id}', 'pastor_update')->name('pastor.update');

        Route::get('/admin/member/view', 'member_view')->name('member.view');
        Route::get('/admin/member/all', 'member_all')->name('member.all');
        Route::get('/admin/member/worker/all', 'member_worker_all')->name('member.worker.all');
        Route::get('/admin/member/ordained/all', 'member_ordained_all')->name('member.ordained.all');
        Route::post('/admin/member/add', 'member_add')->name('member.add');
        Route::post('/admin/member/delete/{id}', 'member_delete')->name('member.delete');
        Route::get('/admin/member/edit/{id}', 'member_edit')->name('member.edit');
        Route::post('/admin/member/update/{id}', 'member_update')->name('member.update');

        Route::get('/admin/request/all', 'admin_request_all')->name('admin.request.all');

        Route::get('/admin/request/edit/{id}', 'admin_request_edit')->name('admin.request.edit');
        Route::post('/admin/request/update/{id}', 'admin_request_update')->name('admin.request.update');

        Route::get('admin/role/view', 'role_view')->name('role.view');
        Route::get('admin/role/edit/{id}', 'role_edit')->name('role.edit');
        Route::post('admin/role/update/{id}', 'role_update')->name('role.update');
        Route::post('admin/role/add', 'role_add')->name('role.add');
        Route::get('admin/role/permission/view/{id}', 'role_permission')->name('role.permission');
        Route::post('admin/role/permission/set/{id}', 'role_permission_set')->name('role.permission.set');
        Route::post('admin/role/delete/{id}', 'role_delete')->name('role.delete');
        Route::get('admin/admin_manager/view', 'admin_manager_view')->name('admin_manager.view');
        Route::post('admin/admin_manager/save', 'admin_admin_manager_save')->name('admin.admin_manager.save');
        Route::get('admin/admin_manager/all', 'admin_manager_all')->name('admin_manager.all');
        Route::get('admin/admin_manager/edit/{id}', 'admin_manager_edit')->name('admin_manager.edit');
        Route::post('admin/admin_manager/update/{id}', 'admin_manager_update')->name('admin.admin_manager.update');
        Route::post('admin/admin_manager/delete/{id}', 'admin_admin_manager_delete')->name('admin.admin_manager.delete');
        Route::post('admin/admin_manager/block/{id}', 'admin_admin_manager_block')->name('admin.admin_manager.block');

        Route::get('/admin/password/view/', 'admin_password_view')->name('admin.password.view');
        Route::post('/admin/password/change/', 'admin_password_change')->name('admin.password.change');
    });

    Route::controller(\App\Http\Controllers\BranchController::class)->group(function () {

        Route::get('/branch/member/view', 'branch_member_view')->name('branch.member.view');
        Route::get('/branch/member/all', 'branch_member_all')->name('branch.member.all');
        Route::get('/branch/member/worker/all', 'branch_member_worker_all')->name('branch.member.worker.all');
        Route::get('/branch/member/ordained/all', 'branch_member_ordained_all')->name('branch.member.ordained.all');
        Route::post('/branch/member/add', 'branch_member_add')->name('member.add');
        Route::post('/branch/member/delete/{id}', 'branch_member_delete')->name('branch.member.delete');
        Route::get('/branch/member/edit/{id}', 'branch_member_edit')->name('branch.member.edit');
        Route::post('/branch/member/update/{id}', 'branch_member_update')->name('branch.member.update');

        Route::get('/branch/testimonial/view', 'branch_testimonial_view')->name('branch.testimonial.view');
        Route::get('/branch/testimonial/all', 'branch_testimonial_all')->name('branch.testimonial.all');
        Route::post('/branch/testimonial/add', 'branch_testimonial_add')->name('branch.testimonial.add');
        Route::post('/branch/testimonial/delete/{id}', 'branch_testimonial_delete')->name('branch.testimonial.delete');
        Route::get('/branch/testimonial/edit/{id}', 'branch_testimonial_edit')->name('branch.testimonial.edit');
        Route::post('/branch/testimonial/update/{id}', 'branch_testimonial_update')->name('branch.testimonial.update');

        Route::get('/branch/request/view', 'branch_request_view')->name('branch.request.view');
        Route::get('/branch/request/all', 'branch_request_all')->name('branch.request.all');
        Route::post('/branch/request/add', 'branch_request_add')->name('branch.request.add');
        Route::post('/branch/request/delete/{id}', 'branch_request_delete')->name('branch.request.delete');
        Route::get('/branch/request/edit/{id}', 'branch_request_edit')->name('branch.request.edit');
        Route::post('/branch/request/update/{id}', 'branch_request_update')->name('branch.request.update');

        Route::get('/branch/password/view/', 'branch_password_view')->name('branch.password.view');
        Route::post('/branch/password/change/', 'branch_password_change')->name('branch.password.change');



    });


    Route::controller(\App\Http\Controllers\AudioController::class)->group(function () {
        Route::get('/admin/audio/view', 'audio_view')->name('audio.view');
        Route::post('/admin/audio/add', 'audio_add')->name('audio.add');
        Route::post('/admin/contact/delete/{id}', 'message_delete')->name('contact.delete');
        Route::get('/admin/media/view', 'media_view')->name('media.view');
        Route::post('/admin/media/add', 'media_add')->name('media.add');
    });



});
require __DIR__.'/auth.php';
