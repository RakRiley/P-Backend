<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\Signer;
use Illuminate\Http\Request;

class SignerController extends BaseController
{          
    
    public function postSigner(Request $request){
        $this->validate($request, [
            
            'name' => 'required'
           
        ]);

        $item = Signer::create($request->all());
        return $item;
    }

    public function getSigner() {
        $item = Signer::all();
        return $item;
    }

    public function deleteSigner($id){
        try{
            $item = Signer::where('id', $id);
            $item ->delete();
            return "success";
        
        } catch (\Exception $e) {
            return "false";
        }
    }

    public function putSigner(Request $request ,$id){
        try{
            $item = Signer::where('id', $id);
            $item->update($request->all());
           return 'update success';
        } catch (\Exception $e) {
            return "update false";
        }

    }

    


}
