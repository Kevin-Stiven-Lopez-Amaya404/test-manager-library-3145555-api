<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LoanItem extends Model { public $timestamps=false; public $incrementing=false; protected $keyType='string'; protected $table='loan_item'; protected $guarded=[]; protected $casts=['due_at'=>'datetime','returned_at'=>'datetime']; public function loan(){return $this->belongsTo(Loan::class,'loan_id');} }
