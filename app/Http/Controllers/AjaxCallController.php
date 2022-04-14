<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Subject;

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
    public function search(Request $request)
    {
        $subjectList = Subject::where('subName','LIKE','%'.$request->name.'%')->get();
        return response()->json($subjectList);
    }
}
