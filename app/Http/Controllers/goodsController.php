<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class goodsController extends Controller
{
    public function goods_add()
    {
        return view('goods/goods_add');

    }
    public function goods_adds(Request $request){
//        $path=$request->file('img')->store('goods');
//        dd($path);die;
        $name = request('name');
        $num = request('num');
        $info=$data=['time'=>time(),'name'=>$name,'num'=>$num];
//        dd($info);die;
        $res=DB::table('shi')->insert($info);
        if($res){
            return redirect('goods/goods_index');
        }
    }
    public function goods_index(){
        $query = request()->all();
        $where = [];
        if($query['name']??''){
            $where[] = ['name','like',"%$query[name]%"];
        }
        $data = DB::table('shi')->where($where)->orderBy('id','desc')->paginate(2);
        return view('goods/goods_index',['data'=>$data,'query'=>$query]);

    }
    public function goods_del($id){
//        dd($id);die;
        $data = DB::table('shi')->delete($id);
        if($data){
            return redirect('goods/goods_index');
        }
    }
    public function goods_edit($id){
//        dd($id);
        $data = DB::table('shi')->where('id',$id)->first();
        return view('goods/goods_edit',['data'=>$data]);
    }
    public function goods_edits(Request $request){

//            $data = $request->except(['_token']);
        $name = request('name');
        $id = request('id');
        $num = request('num');
        $data=['time'=>time(),'name'=>$name,'num'=>$num];
//            dd($data);
        $res = DB::table('shi')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('goods/goods_index');
        }
    }
}
