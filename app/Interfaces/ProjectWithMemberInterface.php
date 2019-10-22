<?php

namespace App\Interfaces;

interface ProjectWithMemberInterface
{
    public function getProjectWithMember($id);
    public function addMembertoProject($data);
}
