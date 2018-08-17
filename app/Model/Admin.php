<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'user';
    protected $fillable = ['id','firstname','lastname','student_code','Role','status','prefix'];
}