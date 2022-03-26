<?php

namespace App\Http\Controllers\StaffMembers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Quiz;
use Session;

class QuizController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->middleware('Admin');
        $this->middleware(function ($request, $next) 
        {
            $this->user = session::get('SessionData');
            if($this->user)
            {
                return $next($request);
            }
            else
            {
                return redirect('loginportal');
            }
        });
    }

    public function index()
    {
        $subDetails = Subject::get();
        return view('StaffMembers/subjectlist')->with(['subDetails'=>$subDetails]);
    }
    public function create()
    {
        return view('StaffMembers/Subject/create');
    }
    public function addSubject(Request $request)
    {
        $SubjectData = new Subject;
        $SubjectData->subID = rand();
        $SubjectData->subNo = $request->code;
        $SubjectData->subName = $request->name;
        $SubjectData->save();
        return redirect()->back()->with('status','added successfully!!');
    }
    public function delete(Request $request)
    {
        if(!empty($request->id)){
            $deletesubject = Subject::where('id',$request->id)->delete();
            return back();
        }
        if(!empty($request->testID))
        {
            $deletetest = Test::where('id',$request->testID)->delete();
            return back();
        }
    }

    public function testList()
    {
        $testData = Test::get();
        return view('StaffMembers/Test/index')->with(['testData'=>$testData]);
    }
    public function addTest(Request $request)
    {
        $this->validate($request,[
            'testname'=> 'required',
            'description'=>'required',
         ]);
        $TestData = new Test;
        $TestData->subID = $request->subID;
        $TestData->testName = $request->testname;
        $TestData->description = $request->description;
        $TestData->save();
        return redirect()->route('TestList')->with('status','Teat Added Successfully!!');
    }

    public function createQuiz(Request $request)
    {
        $testID = $request->testID;
        return view('StaffMembers/Quiz/index')->with(['testID'=>$testID]);
    }
    public function addQuiz(Request $request)
    {
         
        $array = [
            'quiztitle'=> 'required',
            "data"=>'required|array',
            'data.*.question'=>'required',
            'data.*.answers'=>'required',
            'data.*.optionA'=>'required',
            'data.*.optionB'=>'required',
            'data.*.optionC'=>'required',
            'data.*.optionD'=>'required',
         ];
        $message = [
            'quiztitle.required' => "Please Enter Title Of Quiz",
            'data.*.question.required' => "Please Enter question",
            'data.*.answers.required' => "Please Enter answer",
            'data.*.optionA.required' => "Please Enter optionA value",
            'data.*.optionB.required' => "Please Enter optionB value",
            'data.*.optionC.required' => "Please Enter optionC value",
            'data.*.optionD.required' => "Please Enter optionD value",
        ];
        
        $validator =  $this->validate($request,$array,$message);
        foreach($request->data as $k=>$Value)
        {
                $saveData = new Quiz;
                $saveData->testID = $request->testID;
                $saveData->Q_srNo = $k+1;
                $saveData->testName = $request->quiztitle;
                $saveData->question = $Value['question'];
                $saveData->optionA = $Value['optionA'];
                $saveData->optionB = $Value['optionB'];
                $saveData->optionC = $Value['optionC'];
                $saveData->optionD = $Value['optionD'];
                $saveData->answer = $Value['answers'];
                $saveData->save();
        }
        return back()->with('status','Added Successfully');
    }
}
