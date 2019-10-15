<?php

namespace App\Services;

use App\Member;
use App\Interfaces\MemberInterface;

class MemberService implements MemberInterface
{
    public function getMember()
    {
        return Member::all();
    }
}
