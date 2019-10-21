<?php

namespace App\Services;

use App\ProjectWithMember;
use App\Interfaces\ProjectWithMemberInterface;
use Illuminate\Support\Facades\Lang;

class ProjectWithMemberService implements ProjectWithMemberInterface
{
    const FILL_MEMBER_IN_PROJECT = 0;
    public function getProjectWithMember($id)
    {
        return ProjectWithMember::where('project_id', $id)->get()->load('member');
    }

    public function addMembertoProject($data)
    {
        $fill = ProjectWithMember::where([
            ['project_id', $data['project_id']],
            ['member_id', $data['member_id']]
        ])->count();
        //không được tồn tại một thành viên có 2 quyền trong project
        if($fill > self::FILL_MEMBER_IN_PROJECT)
        {
            return response()->json(Lang::get('message.warning'), 404);
        }
            return ProjectWithMember::create($data);
    }
}
