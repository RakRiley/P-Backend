<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\File;
use App\Status;
use Illuminate\Http\Request;
class FileController extends BaseController
{
    public function _contruct(){
        parent::_contruct(new File());
    }

    public function postFile(Request $request){
        $this->validate($request, [
            'file' => 'required'         
        ]);
        
        $item = File::create($request->all());
        return $item;

        // if(!empty($request->data['img'])){
        //     $imgData_base64 =$request->data['img'];
        //     $imgData = substr($imgData_base64, 1+strrpos($imgData_base64, ','));
        //     $imgName_random_uniq = uniqid('',true);
        //     $destinationPath = '../public/upload/farmer_gap_standard_info' ;
        //     if (!file_exists($destinationPath)) {
        //         mkdir($destinationPath, 0777, true);
        //     }
        //     if(file_put_contents('./upload/farmer_gap_standard_info/'."gap-standard-".$imgName_random_uniq.".png", base64_decode($imgData)) != null){
        //         $gapstandardinfo->upload_path = "./upload/farmer_gap_standard_info/gap-standard-".$imgName_random_uniq.".png" ;
        //         $gapstandardinfo->upload_filename = "gap-standard-".$imgName_random_uniq.".png" ;
        //         if($gapstandardinfo->save()){
        //             return $this->responseRequestSuccess($gapstandardinfo);
        //         }else{
        //             return $this->responseRequestError("cannot add img data");
        //         }
        //     }else{
        //         return $this->responseRequestError("cannot save img");
        //     }

        // }
    }


    public function getFile() {
        $item = File::all();
        return $item;
    }

    // public function deleteFile($id){
    //     try{
    //         $item = File::where('id', $id);
    //         $item ->delete();
    //         return "success";
        
    //     } catch (\Exception $e) {
    //         return "false";
    //     }
    // }
    

    public function putFile(Request $request ,$id){
            
            $item = File::where('id',$id)->first();
            if(!empty($request->pdf)){
                $pdf_base64 =$request->pdf;
                $pdf = substr($pdf_base64, 1+strrpos($pdf_base64, ','));
                $pdf_random_uniq = uniqid('',false);
                $destinationPath = '../public/upload/pdf' ;
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                if(file_put_contents('./upload/pdf/'."book".$pdf_random_uniq.".pdf", base64_decode($pdf)) != null){
                    $item->file = "./upload/pdf/book".$pdf_random_uniq.".pdf" ;

                    if($item->save()){
                        return $item;
                    }else{
                        return 'false';
                    }
                }else{
                    return 'connot save file';
                }
            }
           

    }
}
