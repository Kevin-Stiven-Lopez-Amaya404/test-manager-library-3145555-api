<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model { public $timestamps=false; public $incrementing=false; protected $keyType='string'; protected $table='user'; protected $guarded=[]; }
