<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class AjaxCallController extends Controller
{
    public function testStatus(Request $request)
    {
        $update = Test::where('id',$request->testID)->first();
        if($request->status == '0')
        {
            $update->status = '1';
            $update->update();
        }
        else
        {
            $update->status = '0';
            $update->update();
        }
        return back();

    }
}
