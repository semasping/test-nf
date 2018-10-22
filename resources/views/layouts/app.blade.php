<html>
<head>
    <title>News feeds</title>
</head>
<body>
<div class="container">
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>