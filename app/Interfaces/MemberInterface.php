<?php

namespace App\Interfaces;

interface MemberInterface
{
    public function getMember();
    public function addMember($request);
    public function uploadFile($request);
}
