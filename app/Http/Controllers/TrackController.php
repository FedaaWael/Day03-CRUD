<?php

// app/Http/Controllers/TrackController.php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    public function create(Track $tracks)
    {
        $tracks = Track::all();
        return view('tracks.create', compact("tracks"));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $track = new Track;
        $track->name = $data['name'];
        $track->hours = $data['hours'];
        $track->branch = $data['branch'];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('tracks_photos', 'public');
        }
        Track::create($data);
        return redirect()->route('tracks.index');
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {

        $data = $request->all();
        if ($request->hasFile('photo')) {
            if ($track->photo) {
                Storage::delete('public/' . $track->photo);
            }
            $data['photo'] = $request->file('photo')->store('tracks_photos', 'public');
        }

        $track->update($data);
        return redirect()->route('tracks.index');
    }

    public function destroy(Track $track)
    {
        if ($track->photo) {
            Storage::delete('public/' . $track->photo);
        }
        $track->delete();
        return redirect()->route('tracks.index');
    }
}
