<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

   
   protected $table = 'cruds';
   public $fillable = ['nama','username','xxx','password','attribute','op'];

}