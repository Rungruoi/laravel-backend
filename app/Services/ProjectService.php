<?php

namespace App\Services;

use App\Project;
use App\Interfaces\ProjectInterface;

class ProjectService implements ProjectInterface
{
    public function getProject()
    {
        return Project::all();
    }
    public function addProject($data)
    {
        return Project::create($data);
    }
    public function updateProject($id, $data)
    {
        return Project::where('id', $id)->update($data);
    }
}
