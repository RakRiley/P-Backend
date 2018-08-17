<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\Date;
use Illuminate\Http\Request;

class DateController extends BaseController
{
    public function postDate(Request $request){
        $this->validate($request, [
            'id'=>'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'hour' => 'required',
            'minute' => 'required',
            'second' => 'required',
            'day_time'=>'required',
            'mounth_time'=>'required',
            'year_time'=>'required'
           
        ]);

        $item = Date::create($request->all());
        return $item;
    }

    public function getDate() {
        $item = Date::all();
        return $item;
    }

    public function getNumYear() {
        $item = Date::select('year_time')->groupBy('year_time')->get();
        return $item;
    }

    public function deleteDate($id){
        try{
            $item = Date::where('id', $id);
            $item ->delete();
            return "success";
        
        } catch (\Exception $e) {
            return "false";
        }
    }

    public function putDate(Request $request ,$id){
        try{
            $item = Date::where('id', $id);
            $item->update($request->all());
           return 'update success';
        } catch (\Exception $e) {
            return "update false";
        }

    }
}
