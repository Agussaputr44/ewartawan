<!-- resources/views/admin/partial/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('admin.partial.link')
</head>

<body>
    <div class="flex">
        @include('admin.partial.sidebar')
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
    @include('admin.partial.footer')
</body>

</html>
