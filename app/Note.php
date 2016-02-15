<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['body'];
    // The card associated with a note
    public function card()
    {
    	return $this->belongsTo(Card::class);
    }
}
