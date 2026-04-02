<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('movie.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="genre" placeholder="Genre">
        <input type="file" name="video_path" placeholder="Video">
        <input type="file" name="image_path" placeholder="Image">
        <input type="text" name="release_date" placeholder="Release Date">
        <input type="text" name="description" placeholder="Description">

        <select name="genre_id" id="genre_id" placeholder="Genre">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
            @endforeach
        </select>
        <input type="text" name="genre_name" id="genre_name" placeholder="Genre Name" style="display: none;">
        <button type="button" onclick="addGenre()">Add Genre</button>
        <button type="submit">Upload</button>
    </form>
    
    <script>
        var bool = false;
        function addGenre() {
            console.log(bool);
            if(!bool){
                document.getElementById("genre_name").style.display = "inline";
                bool=true;
            }else{
                var name = document.getElementById("genre_name").value;
                // console.log(name);
                var url = "{{ url('/update') }}/" + {name};
                window.location.href = url;
                // console.log(url);
            }
            
        }
    </script>
</body>
</html>