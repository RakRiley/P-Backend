<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function getNewDate() {
        $item = Date::where('year_time', '=', (string)date("Y")+1)->get();
        return $item;
    }

    public function getNumYear() {
        $item = Date::select('year_time')->groupBy('year_time')->get();
        return $item;
    }

    public function getNumMounth() {
        $item = Date::select('mounth_time')->groupBy('mounth_time')->get();
        return $item;
    }
    
    public function getCountMounth(Request $request) {
        $year = (string)date('Y') + 543;
        if(($request->has('year'))){
            $year = $request->year;
        }
        $item = Date::selectRaw("mounth_time,count('id') as books")
        ->where('year_time', '=', $year)
        ->groupBy('mounth_time')
        ->get();
        return $item;
    }

    public function getallYear(){
        $totalyear = [];
        $item = Date::select("year")
                ->groupBy("year")
                ->get();
        foreach ($item as &$value) {
            $newitem;
            $newitem = Date::select("year")
                ->where("year" , "=" , $value->year)
                ->count();
            $object = (object) [
                'year' => $value->year,
                'total' => $newitem,
            ];
            array_push($totalyear, $object);
        }
        
        return $totalyear;
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
