<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectWithMember extends Model
{
    protected $table = 'project_with_member';

    protected $fillable = [
        'project_id',
        'member_id',
        'role'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member', 'member_id', 'id');
    }
}
