@extends("layouts.head")
@section('head')

@endsection
<body>
    @section('navbar')
    @endsection
    @if(Auth::check())
        <h1>Welcome {{ Auth::user()->name }}</h1>
    @else
        <h1>Welcome Guest </h1>
    @endif

    @foreach ($movies as $movie)
        <div>
            <h3>{{ $movie->name }}</h3>
            <p>Genre: {{ $movie->genre }}</p>
            <p>Year: {{ $movie->year }}</p>
            <p>Year: {{ $movie->id }}</p>
            <!-- <video width="400" controls>
                <source src="{{ asset( $movie->video_path) }}" type="video/mp4">
            </video> -->
            <a href="{{route('movies.show',$movie->id)}}">{{ $movie->name }}</a>
        </div>
    @endforeach
    
</body>
</html>