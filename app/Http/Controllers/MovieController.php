<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
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
        $movie->genre = $request->genre;
        $movie->year = $request->year;
        $movie->video_path = $video_path;
        $movie->image_path = $image_path;
        $movie->save();

        return redirect()->route('/');
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movie.show', compact('movie'));
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
