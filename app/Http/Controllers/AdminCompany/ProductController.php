<?php

namespace App\Http\Controllers\AdminCompany;

use Exception;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use UploadTrait;

    public function index(){
        $products = Product::all();
        $categories = Product::pluck('category')->unique()->toArray();
        $types = Product::pluck('type')->unique()->toArray();
        $materials = Product::pluck('material')->unique()->toArray();
        $colors = Product::pluck('color')->unique()->toArray();
        return view ('companyAdmin.index',compact('products' ,'categories','types','materials','colors'));
    }

    public function create(){
        return view ('companyAdmin.addProduct');
    }

    public function store( Request $request){
        $validate = Validator::make($request->all(), [
        'title' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\s\-,]+$/',
        'design_type' => 'required|in:internal,external',
        'category' => 'required|string|min:3|max:50|regex:/^[A-Za-z0-9\s\-\+,]+$/',
        "type" => "required|string|min:3|max:20|regex:/^[A-Za-z0-9\s\-\+,]+$/",
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
        'block_file' => "nullable|file|mimes:rar|max:50240",
        ]);

        if($validate->fails()) {
          $errors = $validate->errors();
          return view('companyAdmin.error',compact('errors'));
          //dd($errors);
        }

        try {
            $product = Product::where( 'title' , $request->title)->first();
            if( !$product ){
            if( $request->block_file ){
                $block_file = $this->upload_file( $request->block_file , 'products/files');
            }
            $images_product = $this->upload_files( $request->product_images,'products/images' );
            if(  $images_product ){

               $product = Product::create([
                    'uuid' => Str::uuid(),
                    'title' => $request->title,
                    'design_type' => $request->design_type,
                    'category' => $request->category,
                    "type" => $request->type,
                    'style' => $request->style,
                    'material' => $request->material,
                    'price' => $request->price,
                    'height' => $request->height,
                    'width' => $request->width,
                    'length' => $request->length,
                    'color' => $request->color,
                    'sale' => $request->sale ?? '0%',
                    'desc' => $request->description,
                    'time_to_make' => $request->time_to_make,
                    'images' => $images_product,
                    'block_file' => $block_file,
                ]);

                if( $product ){
                    return $this->index();
                }else{
                    $errors = 'there is a problem';
                    return view('companyAdmin.str_erroe',compact('errors'));
                }
            }
            }else{
                $errors = 'this  product is ';
                return view('companyAdmin.str_erroe',compact('errors'));
            }
        } catch (Exception $ex) {
          return view('companyAdmin.addProduct');

        }
    }

    public function gallary()
    {
    $images_products = Product::pluck('images')->toArray();

    $first_images = array_map(function ($images) {
        return $images[0] ?? null;
    }, $images_products);

    return view('companyAdmin.productsGallery' , compact('first_images'));
    }


    public function edit( $id ){
        $product = Product::findOrFail($id);
        return view('companyAdmin.editProduct',compact('product'));
    }

    public function update(Request $request, $id)
{
    // التحقق من صحة البيانات
    $validate = Validator::make($request->all(), [
        'title' => 'string|min:3|max:50|regex:/^[A-Za-z0-9\s\-,]+$/',
        'design_type' => 'in:internal,external',
        'category' => 'string|min:3|max:50|regex:/^[A-Za-z0-9\s\-\+,]+$/',
        "type" => "string|min:3|max:20|regex:/^[A-Za-z0-9\s\-\+,]+$/",
        'style' => "string|min:3|max:20|regex:/^[A-Za-z0-9\s\-,]+$/",
        'material' => "string|min:3|max:50|regex:/^[A-Za-z,\s]+$/",
        'price' => "integer|min:100|max:200000",
        'height' => "string",
        'width' => "nullable|string",
        'length' => "string",
        'color' => 'string',
        'sale' => "nullable|regex:/^\d+%?$/",
        'description' => 'string',
        'time_to_make' => 'string',
        'product_images' => "nullable|array",
        'product_images.*' => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        'block_file' => "nullable|file|mimes:rar|max:50240",
    ]);

    if ($validate->fails()) {
        $errors = $validate->errors();
        return view('companyAdmin.error', compact('errors'));
    }

    try {

        $product = Product::find($id);
        if (!$product) {
            $errors = 'Product not found.';
            return view('companyAdmin.str_erroe', compact('errors'));
        }

        $block_file = $product->block_file;
        if ($request->block_file) {
            $block_file = $this->upload_file($request->block_file, 'products/files');
        }

        $images_product = $product->images;
        if ($request->hasFile('product_images')) {
            $images_product = $this->upload_files($request->product_images, 'products/images');
        }


        $product->update([
            'title' => $request->title,
            'design_type' => $request->design_type,
            'category' => $request->category,
            "type" => $request->type,
            'style' => $request->style,
            'material' => $request->material,
            'price' => $request->price,
            'height' => $request->height,
            'width' => $request->width,
            'length' => $request->length,
            'color' => $request->color,
            'sale' => $request->sale ?? '0%',
            'desc' => $request->description,
            'time_to_make' => $request->time_to_make,
            'images' => $images_product,
            'block_file' => $block_file,
        ]);

        return $this->index();

    } catch (Exception $ex) {
        return view('companyAdmin.editProduct');

    }
}

}
