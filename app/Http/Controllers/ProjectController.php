<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectInterface;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

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

    public function store(CreateProjectRequest $request)
    {
        $data = $request->all();
        $addProject = $this->projectService->addProject($data);

        return response()->json("success create", 200);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $updateProject = $this->projectService->updateProject($id, $request->all());

        return response()->json("success update", 200);
    }
}
