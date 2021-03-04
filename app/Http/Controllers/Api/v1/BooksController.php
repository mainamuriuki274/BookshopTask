<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books = Book::with(['genres','authors'])->where('approved',true)->paginate()->get();
        return BookResource::collection($books);
    }
    public function show($id){
        $book = Book::with(['genres','authors'])->where('approved',true)->findOrFail($id);
        return new BookResource($book);
    }
}
