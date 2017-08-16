<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokeUser extends Model
{
  public function participants(){
    return $this->belongsToMany("App\User","poke_users","user_id","poked_user_id");
  }
}
