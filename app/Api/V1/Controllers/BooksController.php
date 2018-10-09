<?php

namespace App\Api\V1\Controllers;

use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $books = Book::all();

        return response()->json([
            'status' => 'ok',
            'books' => $booksbooksbok,
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

        $book = new Book();
        $book->name = $request->input("name");
        $book->type = $request->input("type");
        $book->category = $request->input("category");
        $user = Auth::user();
        $user->books()->save($book);
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
        $book = Book::find($id);
        return response()->json([
            'book' => $book,
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
        $book = Book::find($id);
        if (Auth::id() == $book->owner_id){
            $book->name = $request->input("name");
            $book->type = $request->input("type");
            $book->category = $request->input("category");
            $user = Auth::user();
            $user->books()->saveMany([$book]);
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
        $book = Book::find($id);
        if (Auth::id() == $book->owner_id){
        Book::destroy($id);
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
