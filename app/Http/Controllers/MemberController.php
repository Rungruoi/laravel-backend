<?php

namespace App\Http\Controllers;

use App\Interfaces\MemberInterface;
use App\Member;
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

    public function store(Request $request)
    {
        $data = $request->all();
        $addMember = $this->memberService->addMember($data);

        return response()->json("success create", 200);
    }

    public function destroy($id)
    {
        $deleteProject = Member::find($id)->delete();

        return response()->json("delete success", 200);
    }
}
