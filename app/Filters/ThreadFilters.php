<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{
    protected $filters = ['by'];

    /**
     * Filter the query by a given user name
     *
     * @param $username
     *
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', $username)->first();

        return $this->builder ->where('user_id', $user->id);
    }
}