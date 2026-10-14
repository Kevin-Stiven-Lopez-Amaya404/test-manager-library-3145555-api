<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Book extends Model { public $timestamps=false; public $incrementing=false; protected $keyType='string'; protected $table='book'; protected $guarded=[]; protected $casts=['deleted_at'=>'datetime']; public function category(){return $this->belongsTo(Category::class,'category_id');} }
