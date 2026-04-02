@extends("layouts.head")
@section('head')

@endsection
<body>
    <form action="{{ route('user.signup') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Signup</button>
    </form>
    <a href="{{ route('login') }}">Login</a>
</body>
</html>