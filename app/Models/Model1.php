<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model1 extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ["Denumire", "Categorie", "Stil", "Brand", "Pret", "Volum", "Imagine"];
    //protected $fillable = ["title", "description", "price", "image"];
    public $timestamps = false;
}
