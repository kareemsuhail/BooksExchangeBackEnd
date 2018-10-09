<?php

namespace App\Api\V1\Controllers;

use App\Offer;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();

        return response()->json([
            'status' => 'ok',
            'offers' => $offers,
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

        $offer = new Offer();
        $offer->type = $request->input("type");
        $offer->book_id = $request->input("book_id");
        $offer->save();

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
        $offer = Offer::find($id);
        return response()->json([
            'book' => $offer,
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
        $request->validate([
            'type' => 'required|max:255',
        ]);
        $offer = Offer::find($id);
        $offer->type = $request->input("type");
        $offer->save();
        return response()->json([
            "status" => "ok"
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::destroy($id);
        return response()->json([
            "status" => "ok"
        ], 201);
    }
}
