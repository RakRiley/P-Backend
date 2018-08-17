<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\Document;
use Illuminate\Http\Request;
class DocumentController extends BaseController
{
    public function postDocument(Request $request){
        $this->validate($request, [
            'date_id'=>'required',
            'name' => 'required',
            'form' => 'required',
            'to' => 'required',
            'sender' => 'required',
             'user_id' => 'required'         
        ]);

        $item = Document::create($request->all());
        return $item;
    }

    public function getNumber_of_book_repeatedly() {
        $repeatedly = $_GET['repeatedly'];
        $item = Document::where('number_of_book','like', $repeatedly.'%')->get();
        return $item;
    }

    public function getDocument() {
        $item = Document::join('date', 'document.date_id', '=', 'date.id')->select('document.*', 'date.*')->where('document.status', 'U')->where('date.year_time', '=', date("Y"))->get();
        return $item;
    }

    public function getDocumentC() {
        $item = Document::join('date', 'document.date_id', '=', 'date.id')->select('document.*', 'date.*')->where('document.status', 'C')->where('date.year_time', '=', date("Y"))->get();
        return $item;
    } 

    public function getDocumentnumN() {
        $item = Document::join('date', 'document.date_id', '=', 'date.id')->select('document.*', 'date.*')->where('date.year_time', '=', date("Y"))->get();
        return $item;
    }

    public function getDocumentDistinct() {
        $item = Document::where('status', 'C')->groupBy('number_of_book')->get();
        return $item;
    }

    public function getNumBook() {
        $numbook = $_GET['numbook'];
        $item = Document::where('status', 'U')->where('number_of_book', 'like', $numbook.'%')->groupBy('number_of_book')->orderBy('number_of_book', 'desc')->limit(1)->get();
        return $item;
    }

    public function getDocfromYear() {
        $year = $_GET['year'];
        $item = Document::join('date', 'document.date_id', '=', 'date.id')->select('document.*', 'date.*')->where('date.year_time', '=', $year)->where('document.status', 'U')->get();
        return $item;
    }

    public function getDatepicker() {
        $num = $_GET['numbook'];
        $item1 = Document::join('date', 'document.date_id', '=', 'date.id')->select('date.*')->where('document.number_of_book', '=', $num-1)->get();
        $item2 = Document::join('date', 'document.date_id', '=', 'date.id')->select('date.*')->where('document.number_of_book', '=', $num+1)->get();
        if (count($item1) == 0) {
            $item1 = Document::join('date', 'document.date_id', '=', 'date.id')->select('date.*')->where('document.number_of_book', '=', $num)->get();
        }
        if (count($item2) == 0) {
            $item2 = Document::join('date', 'document.date_id', '=', 'date.id')->select('date.*')->where('document.number_of_book', '=', $num)->get();
        }
        $item = $item1->merge($item2);
        return $item;
    }

    public function deleteDocument($id){
        try{
            $item = Document::where('id', $id);
            $item ->delete();
            return "success";
        
        } catch (\Exception $e) {
            return "false";
        }
    }

    public function putDocument(Request $request ,$id){
        try{
            $item = Document::where('id', $id);
            $item->update($request->all());
           return 'update success';
        } catch (\Exception $e) {
            return "update false";
        }

    }

    public function putStatusDocument(Request $request ,$id){
        try{
            $item = Document::where('id', $id);
            $item->update(['status' => $request['status']]);
           return $request;
        } catch (\Exception $e) {
            return "update false";
        }
    }
}
