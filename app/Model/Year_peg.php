<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Year_peg extends Model
{
    protected $table = 'year_peg';
    protected $fillable = ['peg_change','year_change'];
}