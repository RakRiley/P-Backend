<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Model\Admin;
use Illuminate\Http\Request;

class AdminController extends BaseController
{          
    public function getAdmin() {
        $item = Admin::where('status', '0')->get();
        return $item;
    }

}
