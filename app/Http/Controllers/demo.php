<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class demo extends Controller
{
    public function login(){
        return view('demo/login');

    }
    public function save(Request $request){
    $data = request()->all();
    unset($data['_token']);
    $where=['name'=>$data['name']];
    $info=DB::table("login")->where($where)->first();
    if(empty($info)){
        echo "<script>window.location.href='/demo/login',alert('此用户还未注册)</script>";
    }else if($data['pwd'] !== $info->pwd){
        echo "<script>window.location.href='/demo/login',alert(' 密码输入错误')</script>";
    }else{
        session(['name'=>$data['name']]);
        echo "<script>window.location.href='index',alert('登录成功 ')</script>";
    }

}
    public function index(){
        $session=request()->session()->get('name');
        if ($session==null){
            return "<script>window.location.href='/demo/login',alert('您还未登陆')</script>";
        }
        $redis=new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num=$redis->get('num');
        echo '浏览次数',$num;
        $name=request()->all();
        if(isset($name['text'])){
            $post=DB::table('lv')->where('text','like','%'.$name['text'].'%')->paginate(5);
        }else{
            $post=DB::table('lv')->paginate(5);
        }
        return view('/demo/index')->with('post',$post);




    }

    public function add(Request $request) {
        $data = request()->all();
        unset($data['_token']);
        $session=request()->session()->get('name');
        $info=['time'=>time(),'name'=>$session,'text'=>$data['text']];
        $res = DB::table("lv")->insert($info);
        if($res){
            echo "<script>window.location.href='indexs',alert('留言成功 ')</script>";
        }else{
            echo "<script>window.location.href='indexs',alert('留言失败 ')</script>";
        }

    }
    public function ass(){

    }
    public function del(Request $request){
        $id=$_GET['id'];
        dd($id);
        $where=['id'=>$id];
        $data=DB::table('lv')->where($where)->delete();
        if($data){
            return redirect('/demo/indexs');
        }else{
            return redirect('/demo/indexs');
        }
    }
}
