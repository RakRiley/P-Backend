<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\Year_peg;
use Illuminate\Http\Request;

class Year_pegController extends BaseController
{          
    
    public function postYear_peg(Request $request){
        $this->validate($request, [
            'year_change' => 'required',
            'peg_change' => "required"
            
        ]);

        $item = Year_peg::create($request->all());
        return $item;
    }

    public function getYear_peg() {
        $item = Year_peg::all();
        return $item;
    }

    public function deleteYear_peg($id){
        try{
            $item = Year_peg::where('id', $id);
            $item ->delete();
            return "success";
        
        } catch (\Exception $e) {
            return "false";
        }
    }

    public function putYear_peg(Request $request ,$year_change){
        try{
            $item = Year_peg::where('year_change', $year_change);
            $item->update($request->all());
           return 'update success';
        } catch (\Exception $e) {
            return "update false";
        }

    }

    


}
