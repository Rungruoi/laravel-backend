<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectInterface;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Lang;

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

        return response()->json(Lang::get('message.add_project'), 200);
    }

    public  function show($id)
    {
        $getProject = $this->projectService->detailProject($id);

        return response()->json($getProject);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $updateProject = $this->projectService->updateProject($id, $request->all());

        return response()->json(Lang::get('message.edit_project'), 200);
    }

    public function destroy($id)
    {
        $deleteProject = Project::find($id)->delete();

        return response()->json(Lang::get('message.remove_member'), 200);
    }
}
