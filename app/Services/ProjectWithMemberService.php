<?php

namespace App\Services;

use App\ProjectWithMember;
use App\Interfaces\ProjectWithMemberInterface;

class ProjectWithMemberService implements ProjectWithMemberInterface
{
    public function getProjectWithMember($id)
    {
        return ProjectWithMember::where('project_id', $id)->get()->load('member');
    }

    public function addMembertoProject($data)
    {
        return ProjectWithMember::create($data);
    }
}
