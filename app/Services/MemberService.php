<?php

namespace App\Services;

use App\Member;
use App\Interfaces\MemberInterface;
use Illuminate\Http\Request;
use App\Services\UploadImageService;

class MemberService implements MemberInterface
{
    public function __construct(UploadImageService $uploadService)
    {
        $this->uploadService = $uploadService;
    }
    public function getMember()
    {
        return Member::all();
    }

    public function addMember($data)
    {
        $member = new Member();
        $member->fill($data);
        if ($member->avatar != null) {
            $image = $member->avatar;
            $member->avatar = $this->uploadService->uploadFile($image);
        }
        $member ->save();

        return $member;
    }
}
