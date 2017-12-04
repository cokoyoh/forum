<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
