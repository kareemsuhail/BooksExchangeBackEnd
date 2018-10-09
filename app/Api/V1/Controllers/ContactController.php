<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Auth::user()->contact;
        return response()->json([
            'contact' => $contact,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->facebook_url = $request->input("facebook_url");
        $contact->phone_number = $request->input("phone_number");
        $contact->user_id = Auth::id();
        $contact->save();
        return response()->json([
            "status" => "ok"
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::find($id);
        return response()->json([
            'book' => $user->contact,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        if(Auth::id() == $contact->user_id){
            $contact->facebook_url = $request->input("facebook_url");
            $contact->phone_number = $request->input("phone_number");
            $contact->save();
            return response()->json([
                "status" => "ok"
            ], 201);
        }else{
            return response()->json([
                "msg" => "you are not authorized"
            ], 401);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (Auth::id() == $contact->user_id){
            Contact::destroy($id);
            return response()->json([
                "status" => "ok"
            ], 201);
        }else{
            return response()->json([
                "msg" => "you are not authorized"
            ], 401);
        }
    }
}
