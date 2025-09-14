<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function signin(){
        return view('signin');
    }

    public function login(Request $request)
    {//echo 'iiui';
    try {

        $validatedData = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validatedData->fails()) {
           $errors = $validatedData->errors();
           return view('admin.error',compact('errors'));
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            $errors = 'email or password is incorrect';
            return view('admin.str_erroe',compact('errors'));

        }else{
            $client = Client::where('user_id' , $user->id)->first();

            if( $client->user_type == 'admin'){
                $cities = City::all();
                return view('admin.index',compact('cities'));
            }
            elseif( $client->user_type == 'company'){
                $products = Product::all();
                $categories = Product::pluck('category')->unique()->toArray();
                $types = Product::pluck('type')->unique()->toArray();
                $materials = Product::pluck('material')->unique()->toArray();
                $colors = Product::pluck('color')->unique()->toArray();
                return view ('companyAdmin.index',compact('products' ,'categories','types','materials','colors'));
            }else{
                $errors = 'you donot have permission';
                return view('admin.str_erroe',compact('errors'));
            }
        }
    } catch (Exception $e) {
        return view('signin');
    }
}

}
