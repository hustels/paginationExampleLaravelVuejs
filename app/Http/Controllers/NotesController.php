<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Note;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    public function store(Request $request , Card $card)
    {
    	// Option 1
    	/*
    	$note = new Note;
    	$note->body = $request->body;
    	$card->notes()->save($note);
    	 */
    	//Option 2
    	/*
    	$note = new Note(['body' => $request->body]);
    	$card->notes()->save($note);
    	*/
    
    	//Option 3
    	/*
    	$card->notes()->create([
    		'body' =>$request->body
    		]);
    	*/
    	//Option 4
    	/*
    	$card->notes()->create($request->all());
    	*/
    	//Option 5 el mejor
    	$card->addNote(
    		New Note($request->all())
    		);

    	return back();
    }
}
