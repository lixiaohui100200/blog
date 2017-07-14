<?php

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
//前台
Route::any('/', 'Home\IndexController@index');
Route::get('/about', 'Home\AboutController@index');
Route::any('/features/{cate_id}', 'Home\FeaturesController@index');
Route::get('/codes', 'Home\CodesController@index');
Route::get('/contact', 'Home\ContactController@index');
Route::get('/fashion', 'Home\FashionController@index');
Route::get('/music/{cate_id}', 'Home\MusicController@index');
Route::get('/travel', 'Home\FashionController@index');
Route::get('/single/{art_id}', 'Home\SingleController@index');
//后台
Route::group(['middleware'=>['web','admin.login']],function (){
    Route::get('admin/index','Admin\IndexController@index');
    Route::get('admin/info','Admin\IndexController@info');
    /*
    *分类url开始
    */
    //添加文章分类
    Route::any('admin/add','Admin\CateController@add');
    //文章分类列表
    Route::any('admin/list','Admin\CateController@lst');
    //ajax文章修改排序
    Route::post('admin/changeorder','Admin\CateController@changeorder');
    //修改文章分类
    Route::any('admin/edit/{cate_id}','Admin\CateController@edit');
    //删除分类
    Route::any('admin/del/{cate_id}','Admin\CateController@del');
    /*
     *分类结束
     */
    /*
     *文章url开始
     */
    //添加文章
    Route::any('admin/artAdd','Admin\ArtController@add');
    //图片上传方法
    Route::any('admin/upload','Admin\CommonController@upload');
    //文章列表页
    Route::any('admin/artList','Admin\ArtController@lst');
    //文章修改
    Route::any('admin/artEdit/{art_id}','Admin\ArtController@edit');
    //文章删除
    Route::any('admin/artDel/{art_id}','Admin\ArtController@del');
    /*
     *文章url结束
     */
    Route::any('admin/pass','Admin\IndexController@pass');
    //退出登录
    Route::get('admin/out','Admin\IndexController@out');
});
Route::any('admin/login','Admin\LoginController@login');
Route::get('admin/code','Admin\LoginController@code');


