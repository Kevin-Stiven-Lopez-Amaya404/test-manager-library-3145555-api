<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Member extends Model { public $timestamps=false; public $incrementing=false; protected $keyType='string'; protected $table='member'; protected $guarded=[]; }
