<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<form action="{{ url('stu/update')}}" method="post">
    <ul>
    {{csrf_field()}}
{{--        <input type="hidden" value="{{csrf_token()}}" name="_token">--}}
      <input type="hidden" value="{{$user->id}}" name="id"/>
        <li>
            <input  type="text" name="name" placeholder="账号" value="{{$user->name}}" />
        </li>
        <li>
            <input type="password" name="password" placeholder="密码"  {{$user->password}}/>
        </li>
{{--        <li>--}}
{{--            <input type="radio" name="1" value="male" /> Male--}}
{{--            <input type="radio" name="2" value="female" /> Female--}}
{{--        </li>--}}
        <li >
            <input type="submit" value="修改" />
        </li>
    </ul>
</form>
</body>
</html>

