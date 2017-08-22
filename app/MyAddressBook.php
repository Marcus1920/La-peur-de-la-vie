<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyAddressBook extends Model
{
    protected $table    = 'my_addressbook';

    public  function user(){

        return $this->belongsTo(User::class,'addressbook_owner','id');
    }
}
