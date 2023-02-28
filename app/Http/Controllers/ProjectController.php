<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $url = 'storage/img/';
        $user = User::find(Auth::id());
        // $projects = $user->cars()->get();

        // Pagination => https://laravel.com/docs/10.x/pagination#main-content
        // $myprojects = $user->projects()->get(); // PAGINATE METHOD
        $projects = Project::get(); // Todos los proyectos
        // $projects = $user->cars()->simplePaginate(3); // PAGINATE METHOD
        // $projects = $user->cars()->cursorPaginate(3); // PAGINATE METHOD
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

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required|max:10|unique:projects',
            'descripcion'=>'required',
            'imagen'=>'required|image'
        ]);
        try {
            $project = new Project();
            $project->titulo = $request->input('titulo');
            $project->description = $request->input('descripcion');
            $project->fecha = now();
            $project->user_id = Auth::id();

            $nombreFoto = time() . "-" . $request->file('imagen')->getClientOriginalName();
            $project->imagen = $nombreFoto;
            $project->save();
            $request->file('imagen')->storeAs('public/img', $nombreFoto);

            return redirect()->route('user-projects')->with('status', "Proyecto añadido correctamente");
        } catch (QueryException $ex) {
            return redirect()->route('projects.create')->with('status', "No se ha podido añadir el proyecto correctamente");
        }
    }

    public function show($project) {
        $url = '/storage/img/';
        $project = Project::findOrFail($project);
        return view('projects.show')->with('project', $project)->with('url', $url);
    }

    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();
            return redirect()->route('admin.index')->with('status', "Proyecto borrado correctamente");
        } catch (QueryException $ex) {
            return redirect()->route('admin.index')->with('status', "No se ha podido borrar el proyecto correctamente");
        }
    }
}
