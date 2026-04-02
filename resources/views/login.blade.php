@extends("layouts.head")
@section('head')

@endsection
<body>
    
    <form action="{{ route('user.login') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('signup') }}">Signup</a>
</body>
</html>