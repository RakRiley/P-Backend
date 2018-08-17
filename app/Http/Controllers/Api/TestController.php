<?php
namespace App\Http\Controllers\Api;

use App\Model\Test;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TestController extends BaseController
{
    public function getItem(){
        $item = Test::all();
        return $item;
    }

    public function postItem(Request $request){
        $this->validate($request, [
            'product' => 'required',
            'age' => 'required'
        ]);

        $item = Test::create($request->all());
        return $item;
    }

    public function putItem(Request $request ,$id){
        $item = Test::find($id);
        $item->update($request->all());
        return $item;
    }
    
    public function deleteItem($id){
        try{
            $item = Test::find($id);
            $item ->delete();
            return"success";
        
        } catch (\Exception $e) {
            return "false";
        }
    }
}