<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('upload', compact('genres'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year' => 'required|integer',
            'video_path' => 'required|file|mimes:mp4,mov,avi',
            'image_path' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $video = $request->file('video_path');
        $image = $request->file('image_path');

        $video_path = $video->store('videos', 'public');
        $image_path = $image->store('images', 'public');

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->year = $request->year;
        $movie->description = $request->description;
        $movie->release_date = $request->release_date;
        $movie->rating = $request->rating;
        $movie->poster_path = $request->poster_path;
        $movie->save();

        // if($request->genre_name)
        // {
        //     $genre = new Genre();
        //     $genre->genre_name = $request->genre_name;
        //     $genre->save();
        //     // $movie->genres()->attach($genre->id);
        // }


        return redirect()->route('index');
    }

    public function update_genra($name){
        $genre = new Genre();
        $genre->genre_name = $name->genre_name;
        $genre->save();
    }
    
    public function load(){
        $movies=Movie::all();
        return view("index",compact("movies"));
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movie', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movie.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
