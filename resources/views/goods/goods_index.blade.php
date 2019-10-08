<link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
<form action="">
    商品列表：<input type="text" name="name" value="{{$query['name']??''}}">
    <button>搜索</button>
</form>
<form action="">
    <table border=1>
        <tr>
            <td>商品ID</td>
            <td>货物名称</td>
            <td>货物图片</td>
            <td>库存</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        @if($data)
            @foreach($data as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td>
                        {{$v->img}}
                    </td>
                    <td>{{$v->num}}</td>
                    <td>{{$v->time}}</td>

                    <td>
                        <a href="{{url('/goods/goods_del',['id'=>$v->id])}}">删除</a>
                        <a href="/goods/goods_edit/{{$v->id}}">修改</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    {{$data->appends($query)->links()}}
</form>