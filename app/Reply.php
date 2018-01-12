<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    use Favouritable;

    protected $guarded = [];

    protected $with = ['owner', 'favourites'];

    public function path()
    {
        return '/replies/' . $this->id;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
