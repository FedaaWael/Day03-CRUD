<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::all();
        return response()->json($tracks);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'hours' => 'required|integer',
            'grade' => 'required|integer'
        ];

        $messages = [
            'name.required' => 'The track name is required.',
            'name.string' => 'The track name must be a string.',
            'name.max' => 'The track name must not exceed 255 characters.',
            'hours.required' => 'The number of hours is required.',
            'hours.integer' => 'The number of hours must be an integer.',
            'grade.required' => 'The grade is required.',
            'grade.integer' => 'The grade must be an integer.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $track = Track::create($validator->validated());

        return response()->json(['message' => 'Track created successfully', 'track' => $track], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        return response()->json($track);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $rules = [
            'name' => 'sometimes|required|string|max:255',
            'hours' => 'sometimes|required|integer',
            'grade' => 'sometimes|required|integer'
        ];

        $messages = [
            'name.required' => 'The track name is required.',
            'name.string' => 'The track name must be a string.',
            'name.max' => 'The track name must not exceed 255 characters.',
            'hours.required' => 'The number of hours is required.',
            'hours.integer' => 'The number of hours must be an integer.',
            'grade.required' => 'The grade is required.',
            'grade.integer' => 'The grade must be an integer.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $track->update($validator->validated());

        return response()->json(['message' => 'Track updated successfully', 'track' => $track], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $track->delete();

        return response()->json(['message' => 'Track deleted successfully'], 200);
    }
}
