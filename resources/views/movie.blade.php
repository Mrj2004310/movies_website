@extends("layouts.head")
@section('head')

@endsection
    <body>
        <h3>{{ $movie->name }}</h3>
            <p>Genre: {{ $movie->genre }}</p>
            <p>Year: {{ $movie->year }}</p>
            <p>Year: {{ $movie->id }}</p>
            <!-- <video width="400" controls>
                <source src="{{ asset( $movie->video_path) }}" type="video/mp4">
            </video> -->
            <video src="{{ asset( $movie->video_path) }}" width="400" controls></video>
    </body>
</html>