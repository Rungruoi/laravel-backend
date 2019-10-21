<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMemberToProjectRequest;
use App\Interfaces\ProjectWithMemberInterface;
use App\ProjectWithMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ProjectWithMemberController extends Controller
{
    public function __construct(ProjectWithMemberInterface $projectMember)
    {
        $this->projectWithMember = $projectMember;
    }

    public function index($id)
    {
        $showDetailProject = $this->projectWithMember->getProjectWithMember($id);

        return response()->json($showDetailProject);
    }
    public function store(AddMemberToProjectRequest $request)
    {
        $data = $request->all();
        $addMember = $this->projectWithMember->addMembertoProject($data);

        return response()->json(Lang::get('message.add_member_to_project'), 200);
    }

    public function update(Request $request, $id, $idmember)
    {
    }

    public function destroy($id, $idmember)
    {
        $deleteProject = ProjectWithMember::find($id)->where('member_id', $idmember)->delete();

        return response()->json("delete member in project success", 200);
    }
}
