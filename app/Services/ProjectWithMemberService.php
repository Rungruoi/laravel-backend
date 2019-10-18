<?php

namespace App\Services;

use App\ProjectWithMember;
use App\Interfaces\ProjectWithMemberInterface;

class ProjectWithMemberService implements ProjectWithMemberInterface
{
    public function getProjectWithMember($id)
    {
        return ProjectWithMember::where('project_id', $id)
            ->join('members', 'project_with_member.member_id', '=', 'members.id')
            ->get();
    }
}
