<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LikeButton extends Component
{
    public $project, $likedProjects;

    public function mount($project) {
        $user = User::find(Auth::user()->id);
        $this->likedProjects = $user->likedprojects()->pluck('project_id')->toArray();
    }

    public function render()
    {
        return view('livewire.like-button')->with('project', $this->project);;
    }

    public function toggleLikeProject($project_id)
    {
        $user = User::find(Auth::user()->id);
        if (in_array($project_id, $this->likedProjects)) {
            // Delete
        } else {
            // Store
            return Http::post('localhost:8000/liked-projects', [
                'project_id' => $project_id
            ]);
        }
    }

}
