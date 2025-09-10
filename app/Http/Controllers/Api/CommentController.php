<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use GeneralTrait;

    public function store(Request $request){
    $validate = Validator::make($request->all(), [
        'name' => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
        'email' => 'required|email|unique:users,email',
        'comment' => 'required|string|min:8|max:500|regex:/^[A-Za-z0-9\s\-\.,!?"\'()]+$/',
        "blog_uuid" => "required|string|exists:blogs,uuid"
    ]);

    if ($validate->fails()) {
        return $this->requiredField($validate->errors()->first());
    }

    try {
        $blog_id = Blog::where('uuid' , $request->blog_uuid )->value('id');
        $comment = Comment::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'blog_id' => $blog_id,
                'comment' => $request->comment,
                'email' => $request->email,
            ]);
        $comment = new CommentResource($comment);
        return $this->apiResponse( $comment );

    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }
}
