<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books = Book::with(['genres','authors'])->get();
        return new BookResource($books);
    }
    public function show($id){
        $book = Book::with(['genres','authors'])->findOrFail($id);
        return new BookResource($book);
    }
}
