<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'Document';
    protected $fillable = ['file'];
}