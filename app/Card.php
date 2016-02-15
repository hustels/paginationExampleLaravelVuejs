<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model

{
	protected $fillable =['title'];
    // A card has many notes
    public function notes()
    {
    	return $this->hasMany(Note::class);
    }

    // A Card path
    public function path()
    {
    	return '/cards/'.$this->id;
    }

    public function addNote(Note $note)
    {
    	return $this->notes()->save($note);
    }
}
