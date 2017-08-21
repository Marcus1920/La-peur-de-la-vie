<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyAddressBook extends Model
{
    protected $table    = 'my_address_books';

    public  function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
