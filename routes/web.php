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


// Route::get('/', function () {
//     return view('welcome');
// });



//前台
Route::get('/','Index\IndexController@index');

//前台登入注册
Route::prefix('/login')->group(function(){
	Route::any('reg','Login\LoginController@reg'); //注册
	Route::any('regdo', 'Login\LoginController@regdo'); //注册执行
	Route::any('login','Login\LoginController@login'); //登入
	Route::any('logindo','Login\LoginController@logindo'); //登入执行
});

//项目
Route::prefix('/index')->group(function(){
	Route::get('proinfo','Index\IndexController@proinfo'); //商品详情
	Route::get('cartadd','Index\IndexController@cartadd');//加入购物车
	Route::get('cart','Index\IndexController@cart');//购物车
	Route::get('cartDel','Index\IndexController@cartDel'); //删除购物车单条数据
	Route::get('changeBuyNmber','Index\IndexController@changeBuyNmber'); //更改购买数量
	Route::get('getSubTotal','Index\IndexController@getSubTotal'); //获取小计
	Route::get('checkout/{cart_id}','Index\IndexController@checkout'); //支付页面
	Route::get('pays','Index\AliPayController@pay'); //支付成功页面
});

// 后台用户增删改查
Route::get('admin/index','Admin\IndexController@index');
  Route::get('admin/add','Admin\IndexController@add');
  Route::post('admin/add_do','Admin\IndexController@add_do');
  Route::any('admin/add_index','Admin\IndexController@add_index');
  Route::get('/admin/del/','Admin\IndexController@del');
  Route::get('/admin/edit/{id}','Admin\IndexController@edit');
  Route::any('/admin/update','Admin\IndexController@update');

// 后台商品增删改查
  Route::get('admin/goods/add','Admin\GoodsController@add');
  Route::any('admin/goods/add_do','Admin\GoodsController@add_do');
  Route::get('admin/goods/index','Admin\GoodsController@index');
  Route::get('/admin/goods/del/','Admin\GoodsController@del');
  Route::get('/admin/goods/edit/{goods_id}','Admin\GoodsController@edit');
  Route::any('/admin/goods/update','Admin\GoodsController@update');

// 后台学生增删改查
  Route::get('admin/student/add','Admin\Student@add');
  Route::any('admin/student/add_do','Admin\Student@add_do');
  Route::get('admin/student/index','Admin\Student@index');
  Route::get('admin/student/del','Admin\Student@del');
  Route::get('admin/student/edit/{id}','Admin\Student@edit');
  Route::any('admin/student/update','Admin\Student@update');

  //
Route::any('name/login','name@login');
Route::any('name/save','name@save');
Route::any('name/index','name@index');
Route::any('name/indexc','name@indexc');
Route::any('name/savec','name@savec');
Route::any('name/indexm','name@indexm');
Route::any('name/savem','name@savem');
Route::any('name/indext','name@indext');
Route::any('name/addr','name@addr');
Route::any('name/addc','name@addc');
Route::any('name/add','name@add');
Route::any('name/addrr','name@addrr');
Route::any('name/del','name@del');
Route::any('name/delc','name@delc');
//
Route::any('goods/goods_add', 'goodsController@goods_add');
Route::any('goods/goods_adds', 'goodsController@goods_adds');
Route::any('goods/goods_index', 'goodsController@goods_index');
Route::any('goods/goods98 -_del/{id}','goodsController@goods_del');
Route::any('goods/goods_edit/{id}','goodsController@goods_edit');
Route::any('goods/goods_edits','goodsController@goods_edits');

Route::any('demo/login','demo@login');
Route::any('demo/save','demo@save');
Route::any('demo/index','demo@index');
Route::any('demo/add','demo@add');
Route::any('demo/indexs','demo@indexs');
Route::get('demo/del/{id}','demo@del');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','LoginController@login');
Route::get('/wechat/upload','WechatController@upload'); //上传
Route::post('/wechat/do_upload','WechatController@do_upload'); //上传
Route::get('wechat/get_access_token','WechatController@get_access_token'); //获取access_token
Route::get('/wechat/get_user_list','WechatController@get_user_list'); //获取用户列表
Route::get('/wechat/login','LoginController@wechat_login'); //微信授权登陆
Route::get('/wechat/code','LoginController@code'); //接收code
