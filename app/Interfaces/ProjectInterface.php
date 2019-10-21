<?php

namespace App\Interfaces;

interface ProjectInterface
{
    public function getProject();
    public function addProject($data);
    public function updateProject($id, $data);
    public function detailProject($id);
}
