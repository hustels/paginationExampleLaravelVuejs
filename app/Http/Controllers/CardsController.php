<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    public function index()
    {
        //$cards = Card::simplePaginate(2);
    	//$cards = Card::paginate(2);
    	return view('cards.index' , compact('cards'));
    }

    public function show(Card $card)
    {

    	//return $card->notes;
    	return view('cards.show' , compact('card'));
    }
    public function test()
    {

        return view('cards.index');
    }
    // public function total()
    // {

    //     return $cards = Card::paginate(4);
    //     //return Card::all();
    // }

    public function add(Request $request)
    {

        //return $cards = Card::paginate(2);
        if(Card::create($request->all())){
            return back();
        }else
        {
            return 'No created';
        }
    }
}
