<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = ['id','firstname','lastname','student_code','Role','status','prefix','FacultyName_TH','Telephone'];
}