    <form action="{{url('/goods/goods_edits')}}" method="post" enctype="multipart/form-data">
    <table border='1'>
        {{csrf_field()}}
        <tr>
            <td>货物名称</td>
            <td><input type="text" name="name" value="{{$data->name}}"></td>
        </tr>
        <tr>
            <td>替换图片</td>
            <td><input type="file" name="img"><br></td>
        </tr>
        <tr>
            <td>库存</td>
            <td><input type="text" name="num" value="{{$data->num}}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"></td>
            <input type="hidden" name="id" value="{{$data->id}}">

        </tr>
    </table>
</form>