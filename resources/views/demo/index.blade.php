<form method="post" action="/demo/add">
    <table>

        <tr>
            {{csrf_field()}}
            <td>留言板</td>
        </tr>
        <tr>
            <td>内容</td>
        </tr>
        <tr>
            <td>
                <textarea name="text" rows="5" cols="175"></textarea>
            </td>
        </tr>
        <tr>
            <td><input type="submit"value="发布"></td>
            <td></td>
        </tr>
    </table>
</form>
<form action="/demo/index" method="post">
    @csrf
    留言<input type="text" name="text">
    <input type="submit" value="搜索">
</form>
<table border=1>
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>留言</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    @foreach($post as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->text}}</td>
            <td>{{date('Y-m-d H:i:s',$v->time)}}</td>
            <td><a href="/del?id={{$v->id}}">删除</a></td>
        </tr>
    @endforeach

</table>
{{ $post->links() }}