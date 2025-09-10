<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Area;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//secret123
class AuthController extends Controller
{
    use GeneralTrait , UploadTrait;

    public function register(Request $request){
    $validatedData = Validator::make($request->all(), [
        'name' => 'required|string|min:3|max:20|regex:/^[A-Za-z]+$/',
        'password' => 'required|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        'email' => 'required|email|unique:users,email',
       'phone_number' => 'required|digits:10|unique:clients,phone_number|regex:/^(09)[0-9]{8}$/',
       'user_type' => 'required|string|in:customer,designer,admin,company',
        'area_uuid' => 'required|string|exists:areas,uuid',
    ], [
        'email.unique' => 'Email already exists',
        'password.regex' => 'Password must contain at least one letter and one number.',
    ]);

    if ($validatedData->fails()) {
        return $this->apiResponse(null, false, $validatedData->messages(), 401);
    }

    try {

        $area_id = Area::where('uuid', $request->area_uuid)->value('id');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if( $user ){
        $client = Client::create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'area_id' => $area_id,
            'user_type' => $request->user_type
        ]);
        }else{
            return $this->requiredField('Error in register');
        }
         
        $data['client'] = new ClientResource($client);
        $data['token'] = $client->createToken('MyApp')->plainTextToken;

        return $this->apiResponse($data);
    } catch (Exception $e) {
        return $this->apiResponse(null, false, $e->getMessage(), 500);
    }
    }

    public function login( Request $request ) {
    try{
        $validatedData = Validator::make($request->all(),[
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email',
        ]);

        if(!Auth::attempt(['password' => $request->password,'email' => $request->email ])){
            return $this->unAuthorizeResponse();
        }

        $user_id = Auth::user()->id;
        $client = Client::where('user_id', $user_id)->firstOrFail();



        $data['client'] = new ClientResource($client);
        $data['token'] = $client->createToken('MyApp')->plainTextToken;
        return $this->apiResponse($data);

    }catch( Exception $e){
        return $this->apiResponse(null,false,$e->getMessage(),500);
    }

    }

    public function logout()
    {
    try {
        $user = auth('sanctum')->user();

        if ($user) {
            $user->tokens()->delete();
            return $this->apiResponse([], true, null, 200);
        }else {
            return $this->unAuthorizeResponse();
        }

    } catch (\Exception $ex) {
        return $this->apiResponse(null, false, $ex->getMessage(), 500);
    }
    }

    public function changePassword(Request $request){
    try {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!$user) {
            return $this->unAuthorizeResponse();
        }

        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return $this->apiResponse( null, false, 'the password is false', 401);
        }

        $user->update(['password' => bcrypt($validatedData['new_password'])]);
        $msg = 'password changed sucssesfuly';

        return $this->apiResponse($msg);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->requiredField( $e->errors() );
        } catch (Exception $ex) {
            return $this->apiResponse(null, false, $ex->getMessage(), 500);
        }
    }

    public function changeProfile( Request $request)
    {
    try {
        $validate = Validator::make($request->all(),[
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($validate->fails()) {
        return $this->apiResponse(null, false, $validate->messages(), 401);
        }

        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();
        $url = $this->upload_file( $request->image , 'clients/profile/');

        if( $url ){
            $client->image = $url;
            $client->save();
            $profile = new ProfileResource( $client );
            return $this->apiResponse( $profile );
        }else{
            $msg = 'there is awrong';
           return $this->apiResponse( $msg );
        }

    } catch (\Exception $ex) {
        return $this->apiResponse(null, false, $ex->getMessage(), 500);
    }
    }

    public function edit_area( Request $request){
        try{
        $validatedData = Validator::make($request->all(),[
            'password' => 'required|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'email' => 'required|email|exists:users,email',
            'area_uuid' => 'required|string|exists:areas,uuid',
        ]);

        if($validatedData->fails()) {
        return $this->apiResponse(null, false, $validatedData->messages(), 401);
        }

        if(!Auth::attempt(['password' => $request->password,'email' => $request->email ])){
            return $this->unAuthorizeResponse();
        }

        $area_id = Area::where('uuid', $request->area_uuid)->value('id');
        $user_id = Auth::id();
        $client = Client::where('user_id', $user_id)->first();
        $client->area_id = $area_id;
        $client->save();

        $msg = 'the are is changed';
        return $this->apiResponse( $msg );

    }catch( Exception $e){
        return $this->apiResponse(null,false,$e->getMessage(),500);
    }
}
}
