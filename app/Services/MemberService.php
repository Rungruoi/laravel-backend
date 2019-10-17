<?php

namespace App\Services;

use App\Member;
use App\Interfaces\MemberInterface;
use Illuminate\Http\Request;

class MemberService implements MemberInterface
{
    public function getMember()
    {
        return Member::all();
    }

    public function addMember($request)
    {
        $member = new Member();
        $member->fill($request->all());
        if ($request->hasFile('avatar')) {
            $member->avatar = $this->uploadFile($request);
        }
        $member ->save();

        return $member;
    }

    public function uploadFile($request)
    {
            $image = $request->avatar;
            $extension = $image->getClientOriginalExtension();
            $file_name = time() . '-' . rand(1, 100) . '.' . $extension;

            return asset($image->move('images/', $file_name));
    }
}
