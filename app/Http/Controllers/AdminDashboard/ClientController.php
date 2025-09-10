<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::where('user_type', 'designer')
                 ->orWhere('user_type', 'customer')
                 ->get();
        return view('admin.client',compact('clients'));
    }

    public function edit( $id ){
        $client = Client::findOrFail($id);
        return view('admin.editClientBallance',['client' => $client]);
    }

    public function update( Request $request, $id){
        $validate = Validator::make($request->all(), [
            "account" => "required|integer|min:100|max:10000"
        ]);

        if ($validate->fails()) {
        return view('admin.error');
        }
        $client = Client::findOrFail($id);
        $client->account = $request->account;
        $client->save();

        $this->index();
    }
    }

