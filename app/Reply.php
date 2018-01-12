<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function path()
    {
        return '/replies/' . $this->id;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favourited');
    }

    public function favourite()
    {
        $attributes = ['user_id' => auth()->id()];

        if(! $this->favourites()->where($attributes)->exists())
        {
            return $this->favourites()->create($attributes);
        }
    }

    public function isFavourited()
    {
        return $this->favourites()->where(['user_id' => auth()->id()])->exists();
    }
}
