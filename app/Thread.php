<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('replyCount', function ($builder){
            $builder->withCount('replies');
        });
    }

    public function path() {
        return '/threads/'. $this->channel->slug . '/'. $this->id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)
            ->withCount('favourites')
            ->with('owner');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);

        return back();
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
