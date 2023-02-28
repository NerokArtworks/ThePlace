<?php

namespace App\Http\Controllers;

use App\Models\LikedProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APILikedProjects extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likedProjects = LikedProject::all();

        $likesByProject = $likedProjects->groupBy('project_id')->map(function($likes) {
            return count($likes);
        });

        return response()->json([
            'status' => true,
            'likes_by_project' => $likesByProject,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $project = Project::findOrFail($request->input('project_id'));
        if (!$user) {
            return response()->json(['status' => 'Unauthorized'], 401);
        }
        $likedProject = new LikedProject([
            'user_id' => $user->id,
            'project_id' => $project->id
        ]);
        $likedProject->save();
        return response()->json(['status' => 'Liked successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
