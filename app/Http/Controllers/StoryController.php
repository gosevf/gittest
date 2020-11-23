<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\User;


class StoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function show($story_id){
        $story = Story::find($story_id);
        return view('stories/show', compact('story'));
    }
}
