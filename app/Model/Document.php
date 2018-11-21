<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $fillable = ['id','date_id','user_id','number_of_book','name','form','to','sender','speed','secret','status','note','practice'];
    // protected $fillable = ['file'];
}