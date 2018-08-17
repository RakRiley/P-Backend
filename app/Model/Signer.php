<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Signer extends Model
{
    protected $table = 'signer';
    protected $fillable = ['id','name'];
}