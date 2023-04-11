<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function root()
    {

       // dd(User::select(['id','name'])->first()->toArray());
      //  dd(User::whereId(1)->get()->toArray());

        dd(Topic::recent('created_at','asc')->pluck('id'));
        return view('pages.root');
    }
}
