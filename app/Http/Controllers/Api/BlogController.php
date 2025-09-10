<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\Blog_MinResource;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    use GeneralTrait , UploadTrait;

    public function index(){
        $Blogs = Blog::all();
        $Blogs = BlogResource::collection( $Blogs );
        return $this->apiResponse( $Blogs );
    }
    public function least_three(){
        $blogs = Blog::latest()->take(3)->get();
        $Blogs = Blog_MinResource::collection( $blogs );
        return $this->apiResponse( $Blogs );
    }

    public function store(Request $request){

    $validate = Validator::make($request->all(), [
        "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        'auther' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\s\-,]+$/',
        'title' => 'required|string|min:3|max:100|regex:/^[A-Za-z0-9\s\-\:,]+$/',
        'content' => 'required|string|min:10',

    ]);

    if ($validate->fails()) {
        return $this->requiredField($validate->errors()->first());
    }

    try {
        $image = $this->upload_file( $request->image , 'blogs/articles/');
//return $image;
            $blog = Blog::create([
                'uuid' => Str::uuid(),
                'image' => $image,
                'auther' => $request->auther,
                'title' => $request->title,
                'content' => $request->content,
            ]);

        $blog = new BlogResource($blog);
        return $this->apiResponse( $blog );

    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

    public function show( $uuid ){
        try{
            
        $blog = Blog::where('uuid' , $uuid)->first();
        $blog = new BlogResource($blog);
        return $this->apiResponse( $blog );

        }catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

}
