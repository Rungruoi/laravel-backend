<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectInterface;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(ProjectInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $project = $this->projectService->getProject();
        return response()->json($project);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $addProject = $this->projectService->addProject($data);
        return response()->json("success create", 200);
    }

    public function update(Request $request, $id)
    {
        $updateProject = $this->projectService->updateProject($id, $request->all());
        return response()->json("success update", 200);
    }

    public function destroy($id)
    {
        $deleteProject = Project::find($id)->delete();
        return response()->json("delete success", 200);
    }
}
