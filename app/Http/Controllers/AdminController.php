<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $url = '/storage/img/';
        $users = User::all();
        // $mycars = $user->cars()->get();

        // Pagination => https://laravel.com/docs/10.x/pagination#main-content
        // $myprojects = $user->projects()->get(); // PAGINATE METHOD
        // $projects = Project::get(); // Todos los proyectos
        // $mycars = $user->cars()->simplePaginate(3); // PAGINATE METHOD
        // $mycars = $user->cars()->cursorPaginate(3); // PAGINATE METHOD
        // return view('projects.index')->with('projects', $projects)->with('url', $url);
        return view('admin.index')->with('users', $users)->with('url', $url);
    }

    public function create()
    {
        //
    }

    // Tengo que llamarlo $admin para que no de error
    // pero es el id de cualquier usuario
    public function show($admin) {
        $url = '/storage/img/';
        $user = User::findOrFail($admin);
        return view('admin.show')->with('admin', $user)->with('url', $url);
    }

    public function destroy($admin) {
        try {
            $url = '/storage/img/';
            $user = User::findOrFail($admin);
            $user->delete();
            $users = User::all();
            return view('admin.index')->with('users', $users)
                ->with('url', $url)
                ->with('success', 'Usuario borrado correctamente.');
        } catch (QueryException $ex) {
            return redirect()->route('admin.index')->with('status', "No se ha podido borrar el usuario correctamente");
        }



    }
}
