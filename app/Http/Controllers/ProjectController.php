<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index()
    {
        $url = '/storage/img/';
        $user = User::find(Auth::id());
        // $mycars = $user->cars()->get();

        // Pagination => https://laravel.com/docs/10.x/pagination#main-content
        // $myprojects = $user->projects()->get(); // PAGINATE METHOD
        $projects = Project::get(); // Todos los proyectos
        // $mycars = $user->cars()->simplePaginate(3); // PAGINATE METHOD
        // $mycars = $user->cars()->cursorPaginate(3); // PAGINATE METHOD
        return view('projects.index')->with('projects', $projects)->with('url', $url);
    }

    public function userProjects()
    {
        $url = '/storage/img/';
        $user = User::find(Auth::id());

        $myprojects = $user->projects()->get();
        return view('projects.user-projects')->with('myprojects', $myprojects)->with('url', $url);
        // return Redirect::to('projects/user-projects')->with('myprojects', $myprojects)->with('url', $url);
    }

    public function savedProjects()
    {
        $url = '/storage/img/';
        $user = User::find(Auth::id());

        $savedprojects = $user->savedProjects()->get();
        return view('projects.saved-projects')->with('savedprojects', $savedprojects)->with('url', $url);
        // return Redirect::to('projects/user-projects')->with('myprojects', $myprojects)->with('url', $url);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show() {
        return ("show");
    }
}