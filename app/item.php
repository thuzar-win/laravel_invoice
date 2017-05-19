<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = ['invoice_name','item_name','price','qty','tax'];
}
