<?php

namespace App\Http\Controllers;

use App\Interfaces\MemberInterface;
use Illuminate\Http\Request;

class MemberController extends BaseController
{
    public function __construct(MemberInterface $memberService)
    {
        $this->memberService = $memberService;
    }

    public function index()
    {
        $member = $this->memberService->getMember();
        return response()->json($member);
    }
}
