<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'Date';
    protected $fillable = ['id','day','month','year','minute','hour','day_time','mounth_time','year_time','second'];
}