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
Route::any('/register', 'Home\RegisterController@index');
Route::get('/about', 'Home\AboutController@index');
Route::any('/features/{cate_id}', 'Home\FeaturesController@index');
Route::get('/codes', 'Home\CodesController@index');
Route::any('/contact', 'Home\ContactController@index');
Route::get('/fashion', 'Home\FashionController@index');
Route::get('/music/{cate_id}', 'Home\MusicController@index');
Route::get('/travel', 'Home\FashionController@index');
Route::get('/single/{art_id}', 'Home\SingleController@index');
Route::any('/singles', 'Home\SingleController@comment');
//后台
Route::group(['middleware'=>['web','admin.login']],function (){
    Route::get('admin/index','Admin\IndexController@index');
    Route::get('admin/info','Admin\IndexController@info');
    //更换首页banner
    Route::any('admin/banner','Admin\BannerController@banner');
    //更换其他页面banner
    Route::any('admin/banner_','Admin\BannerController@banner_');
    //banner页面
    Route::get('admin/banner_list','Admin\BannerController@list1');
    Route::get('admin/banner_list_','Admin\BannerController@list2');
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
    //关于自己
    Route::any('admin/about','Admin\AboutController@index');
    Route::any('admin/about1','Admin\AboutController@export');
    //关于自己修改
    Route::any('admin/editAbout','Admin\AboutController@edit');
    /*
     *数据库备份与恢复
     */
    #数据库备份恢复页
    Route::any('admin/database','Admin\DatabaseController@index');
    //下载数据库文件到本地地址
    Route::any('admin/down','Admin\DatabaseController@down');
    //导入数据库恢复文件
    Route::any('admin/_import','Admin\DatabaseController@_import');
    #
    #意见反馈模块
    #
    Route::any('admin/contact','Admin\ContactController@index');
    //意见反馈详细内容
    Route::any('admin/contact_content','Admin\ContactController@content');
    /*
     * 后台评论模块管理
     */
    Route::any('admin/comment','Admin\CommentController@index');
    //点击得到详细文章
    Route::any('admin/comment_','Admin\CommentController@comment');
    //点击更换审核
    Route::any('admin/show','Admin\CommentController@show_');
    //关键字过滤
    Route::any('admin/keywords','Admin\CommentController@keys');
    //删除关键字
    Route::any('admin/remove_key','Admin\CommentController@rem');
});
Route::any('admin/login','Admin\LoginController@login');
Route::any('admin/code','Admin\LoginController@code');
/*
 *学生管理模块
 */
//学生管理首页
Route::any('student/index','Student\IndexController@index');
//学生信息卡列表
Route::any('student/list','Student\ListController@index');
//导入Excel学生信息到数据库
Route::any('student/addStudent','Student\StudentController@add');
//班级分类模块
Route::any('student/addClass','Student\ClassController@add');
//班级分类列表
Route::any('student/listClass','Student\ClassController@lst');
//显示班级下的学员详细信息
Route::any('student/stuList/{class_id}','Student\StudentController@showStudent');
//展示界面入口为是就业 未就业 本周入职
Route::any('student/job','Student\JobController@index');
//展示为未就业、本周入职、已就业学员信息
Route::any('student/job_message/{type}/{class_id}','Student\JobController@job_n');
//记录页（未就业）
Route::any('student/record/{stu_id}','Student\JobController@record');
//修改页（本周入职）
Route::any('student/record_z/{stu_id}','Student\JobController@record_z');
//添加跟踪内容
Route::any('student/record_content','Student\JobController@add_record');
//修改未就业为本周入职
Route::any('student/record_revamp','Student\JobController@revamp_z');
//修改未就业为已就业
Route::any('student/record_revamp_y','Student\JobController@revamp_y');
//本周未记录和已经记录学员
Route::any('student/no_record','Student\RecordController@index');
//本周未记录学员列表
Route::any('student/no_job_record/{type}/{xuan}/{class}/','Student\RecordController@no_job');
//将学生分给用户
Route::any('student/group','Student\GroupController@index');
//学生分组主页并增加到用户分组
Route::any('student/group_index/{class_id}','Student\GroupController@group');
//删除在分组中的学员
Route::any('student/group_del/{class_id}','Student\GroupController@group_del');
