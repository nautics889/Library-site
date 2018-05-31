<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Comment;
use Intervention\Image\Facades\Image as ImageInt;

class BooksController extends Controller
{
	public function getMainPage() {
		return view('main');
	}

    public function getBooksListArt() {
    	$books = Book::where('type', 'art')->get();
    	return view('art', ['books'=>$books]);
    }

    public function getBooksItem($id) {
    	$comments = Comment::where('book_id', $id)->get();
    	return view('book', ['book'=>Book::find($id), 'comments'=>$comments]);
    }

    public function addBook(Request $request) {
    	$book = new Book;

    	if($request->method()=='POST') {
    		$path = public_path()."\upload\\";
    		$file = $request->file('picrel');
    		$filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
    		$img = ImageInt::make($file);
    		$img->resize(200,200)->save($path . $filename);

    		$book->fill(array(
       			'title' => $request['title'],
    			'description' => $request['description'],
    			'type' => $request['select_type'],
    			'kind' => $request['select_kind'],
    			'author' => $request['author'],
    			'price' => $request['price'],
    			'instock' => $request['instock'],
    			'picrel' => "$filename",
    		));
    		$book->save();
    	}
    	return view('add_success', ['title' => $request['title']]);
    }

    public function addComment(Request $request) {
    	$comment = new Comment;
    	if($request->method()=='POST') {
    		$comment->fill(array(
    			'book_id' => $request['book'],
    			'user_id' => $request['user'],
    			'comment' => $request['new_comment'],
    		));
    		$comment->save();
    	}
    	return redirect()->route('item', $request['book']);
    }
}
