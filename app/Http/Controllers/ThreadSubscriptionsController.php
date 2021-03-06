<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadSubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store', 'destroy');
    }
    
    
    public function store($channel, Thread $thread)
    {
        $thread->subscribe();
    }

    public function destroy($channel, Thread $thread)
    {
        $thread->unsubscribe();
    }
}
