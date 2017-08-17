<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokeUser extends Model
{
  /* poker and pokee define the relation between a Poke and the users that
     did it. */
  public function poker(){
    return $this->belongsToMany("App\User","poke_users","id","user_id");
  }
  public function pokee(){
    return $this->belongsToMany("App\User","poke_users","id","poked_user_id");
  }
  protected $eagerload= ["user"];
}
