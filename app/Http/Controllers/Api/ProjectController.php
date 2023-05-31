<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies', 'type'])->paginate(4);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::where('id', $id)->with(['technologies', 'type'])->first();

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
