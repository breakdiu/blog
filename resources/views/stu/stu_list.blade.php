<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>id</td>
        <td>用户</td>
        <td>密码</td>

    </tr>
    @foreach($stu as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->password}}</td>
        <td><a href="/stu/edit/{{$v->id}}">修改</a></td>
        <td><a href="/stu/destroy/{{$v->id}}">删除</a></td>
    </tr>
        @endforeach
</table>
</body>
</html>
