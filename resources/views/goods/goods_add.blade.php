    <form action="{{url('/goods/goods_adds')}}" method="post" enctype="multipart/form-data">
    <table border='1'>
        {{csrf_field()}}
        <tr>
            <td>货物名称</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>货物图片</td>
            <td><input type="file" name="img"><br></td>
        </tr>
        <tr>
            <td>库存</td>
            <td><input type="text" name="num"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
    