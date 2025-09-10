<?php

namespace App\Http\Controllers\AdminCompany;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use UploadTrait;

    public function index(){
        $products = Product::all();
        return view ('companyAdmin.index',compact('products'));

    }

    public function create(){
        return view ('companyAdmin.addProduct');
    }

    public function store( Request $request){
        $validate = Validator::make($request->all(), [
        'title' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\s\-,]+$/',
        'site' => 'required|in:internal,external',
        'category' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\s\-,]+$/',
        "type" => "required|string|min:3|max:20|regex:/^[A-Za-z0-9\s\-,]+$/",
        'style' => "required|string|min:3|max:20|regex:/^[A-Za-z0-9\s\-,]+$/",
        'material' => "required|string|min:3|max:50|regex:/^[A-Za-z,\s]+$/",
        'price' => "required|integer|min:100|max:200000",
        'height' => "required|string",
        'width' => "nullable|string",
        'length' => "required|string",
        'color' => 'required|string',
        'sale' => "nullable|regex:/^\d+%?$/",
        'description' => 'required|string',
        'time_to_make' => 'required|string',
        'product_images' => "required|array",
        'product_images.*' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        'block_file' => "nullable|file|mimes:rar|max:10240",
        ]);

        if($validate->fails()) {
          $errors = $validate->errors();
          return view('companyAdmin.error',compact('errors'));
        }
        try {
            if( $request->block_file ){
                $block_file = $this->upload_file( $request->block_file , 'products/files');
            }
            $images_product = $this->upload_files( $request->product_images,'products/images' );
            if(  $images_product ){

               $product = Product::create([
                    'uuid' => Str::uuid(),
                    'title' => $request->title,
                    'site' => $request->site,
                    'category' => $request->category,
                    "type" => $request->type,
                    'style' => $request->style,
                    'material' => $request->material,
                    'price' => $request->price,
                    'height' => $request->height,
                    'width' => $request->width,
                    'length' => $request->length,
                    'color' => $request->color,
                    'sale' => $request->sale,
                    'desc' => $request->description,
                    'time_to_make' => $request->time_to_make,
                    'images' => $images_product,
                    //'block_file' => $block_file,
                ]);
                return $this->index();
            }
        } catch (\Exception $ex) {
          return view('companyAdmin.addProduct');
        }
    }

    public function gallary(){
        return view ('companyAdmin.productsGallery');
    }

    public function edit( $id ){
        $product = Product::findOrFail($id);
        return view('companyAdmin.editProduct',compact('product'));
        //dd($product);
    }

    public function update( Request $request , $id ){
        //$product = Product::findOrFail($id);
       // return view('companyAdmin.editProduct',compact('product'));
        //dd($product);
    }

    public function delete( $id ){
        if ($product = Product::findOrFail($id)->delete()){
           return $this->index();
        }else{
            $errors = 'there is problem in deletion';
            return view('admin.str_erroe',compact('errors'));
        }
    }

    public function deleted_product( ){
        $deletedRecords = Product::onlyTrashed()->get();
        return view('companyAdmin.productTrash', compact('deletedRecords'));
    }

    public function restore( $id ){
       $restored = Product::withTrashed()->where('id', $id)->first();
        $restored->restore();
        return $this->index();

    }
}
