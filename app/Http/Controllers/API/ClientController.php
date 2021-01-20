<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json(['message' => 'Clients retrieved successfully', 'data' => $clients]);
    }

    public function store(Request $request)
    {
        $client = new Client();

        if ($request->has('image') && !empty($request->image)) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/clients'), $imageName);
            $path = ('public/images/gallery/' . $imageName);
            $client->image = $path;
        }
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->office_address = $request->office_address;
        $client->contact_name = $request->contact_name;
        $client->contact_office = $request->contact_office;
        $client->contact_email = $request->contact_email;
        $client->type = $request->type;

        if ($client->save()) {
            return response()->json(['status' => true, 'message' => 'Client Information Added!']);
        } else {
            return response()->json(['status' => false, 'nessage' => 'There is an error. Please try again!']);
        }
    }
}
