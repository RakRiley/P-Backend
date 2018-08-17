<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{          
    
    public function postUser(Request $request){
        $this->validate($request, [
            'student_code' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'Role' => 'required',
            'prefix' => 'required'
        ]);

        $item = User::create($request->all());
        return $item;
    }

    public function getUser() {
        $item = User::all();
        return $item;
    }

    public function deleteUser($id){
        try{
            $item = User::where('id', $id);
            $item ->delete();
            return "success";
        
        } catch (\Exception $e) {
            return "false";
        }
    }

    public function putUser(Request $request ,$id){
        try{
            $item = User::where('id', $id);
            $item->update($request->all());
           return 'update success';
        } catch (\Exception $e) {
            return "update false";
        }

    }

    


}
