<?php

namespace App\Http\Controllers;

use App\Interfaces\MemberInterface;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemberRequest;
use Illuminate\Support\Facades\Lang;

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

    public function store(CreateMemberRequest $request)
    {
        $data = $request->all();
        $addMember = $this->memberService->addMember($data);

        return response()->json(Lang::get('message.add_member'), 200);
    }

    public function update(CreateMemberRequest $request, $id)
    {
        $data = $request->all();
        $updateMember = $this->memberService->updateMember($id, $data);

        return response()->json(Lang::get('message.edit_member'), 200);
    }

    public function destroy($id)
    {
        $deleteProject = Member::find($id)->delete();

        return response()->json(Lang::get('message.remove_member'), 200);
    }
}
