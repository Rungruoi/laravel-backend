<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectWithMemberRequest;
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
    public function store(ProjectWithMemberRequest $request)
    {
        $data = $request->all();
        $addMember = $this->projectWithMember->addMembertoProject($data);

        return response()->json(Lang::get('message.add_member_to_project'), 200);
    }

    public function show($id, $idmember)
    {
        $detail = $this->projectWithMember->detailProjectWithMember($id, $idmember);

        return response()->json($detail);
    }

    public function update(Request $request, $id, $idmember)
    {
        $data = $request->all();
        $updateData = $this->projectWithMember->updateProjectWithMember($id, $idmember, $data);

        return response()->json(Lang::get('message.edit_member'), 200);
    }

    public function destroy($id, $idmember)
    {
        $deleteProject = ProjectWithMember::where([
            ['member_id', $idmember],
            ['project_id', $id]
        ])->delete();

        return response()->json(Lang::get('message.remove_member'), 200);
    }
}
