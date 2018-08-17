<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';
    protected $fillable = ['product','age','created_at','updated_at'];
}