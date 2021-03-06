<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>e-Rapor</title>
    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{elixir('css/app.css')}}" rel="stylesheet">
    <style>body { padding-top: 70px; }</style>
</head>
<body>
    @include('part.navbar')
    @yield('content')

    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{elixir('js/app.js')}}"></script>
    <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.bootstrap.js')}}"></script>
</body>
</html>
