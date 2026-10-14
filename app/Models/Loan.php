<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Loan extends Model { public $timestamps=false; public $incrementing=false; protected $keyType='string'; protected $table='loan'; protected $guarded=[]; protected $casts=['loaned_at'=>'datetime']; public function items(){return $this->hasMany(LoanItem::class,'loan_id');} }
