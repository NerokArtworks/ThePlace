<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * OPCIÓN ASÍNCRONA DE GUARDAR PROYECTOS
 */
class SaveProjectController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $project = Project::find($id);

            // Si no está guardado
            if (!$user->savedProjects()->wherePivot('project_id', $project->id)->exists()) {
                // Guardar el proyecto
                $user->savedProjects()->attach($project, ['save_date' => now()]);
                return redirect()->back()->with('success', 'Proyecto guardado correctamente.');
            } else {
                // Eliminar el registro de la tabla SavedProjects
                $user->savedProjects()->detach($project);
                return redirect()->back()->with('success', 'Proyecto eliminado correctamente.');
            }
        } else {
            return redirect()->back()->with('error', 'Debes estar autenticado para guardar proyectos.');
        }
    }

    public function saveProject(Request $request, $id) {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $project = Project::find($id);

            // Guardar el proyecto
            $user->savedProjects()->attach($project);

            return redirect()->back()->with('success', 'Proyecto guardado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Debes estar autenticado para guardar proyectos.');
        }
    }
}
