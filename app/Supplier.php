<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use Notifiable;
    //

    protected $fillable = array('title','avi','supplier_id','place_id','LG','state','status','country','address');

    public static  $rules = array(
        'user_id' => 'required',
        'LG' => 'required',
        'state' => 'required',
        'status' => 'required',
        'title' => 'required',
        'country' => 'required',
        'address' => 'required',
        );




}
