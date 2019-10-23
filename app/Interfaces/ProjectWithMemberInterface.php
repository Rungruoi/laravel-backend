<?php

namespace App\Interfaces;

interface ProjectWithMemberInterface
{
    public function getProjectWithMember($id);
    public function addMembertoProject($data);
    public function detailProjectWithMember($id, $idmember);
    public function updateProjectWithMember($id, $idmember, $data);
}
