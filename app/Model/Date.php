<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'date';
    protected $fillable = ['id','day','month','year','minute','hour','day_time','mounth_time','year_time','second','all_date'];
}