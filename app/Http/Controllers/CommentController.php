<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function store(request $request)
    {
       $request->validate([
           'description' => 'required'
       ]);
       $input = $request->all();
       $input['user_id'] = auth()->user()->id;
    //    $input['parent_id'] = isset($request->parent_id) ? $request->parent_id: '';
       Comment::create($input);
       
       return back();
    }
}
