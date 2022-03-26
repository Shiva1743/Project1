<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Quiz;
use App\Models\StudentScore;
use Session;

class SubjectController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->middleware('student');
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
        $subjectList = Subject::paginate(9);
        return view('Student/Subject/index',compact('subjectList'));
    }
    public function testList(Request $request)
    {
    
        $testList = Test::where('subID',$request->subID)->get();
        $attemptData = StudentScore::where('testID',$request->testID)->first();
        return view('Student/Test/index')->with(['testList'=>$testList]);
    }
    public function quizIndex(Request $request)
    {
        $testID = $request->testID;
        $quizList = Quiz::where('testID',$request->testID)->get();
        return view('Student/Quiz/index')->with(['quizList'=>$quizList,'testID'=>$testID]);
    }
    public function submitQuiz(Request $request)
    {
        $array = [
            "data"=>'required|array',
            'data.*.answer'=>'required',
         ];
        $message = [
            'data.*.answer.required' => "Please select option",
        ];
        
        $validator =  $this->validate($request,$array,$message);
        
        $count = 0;
        $allData = $request->data;
        foreach($allData as $value)
        {   
            $quizData = Quiz::where('testID',$request->testID)
                        ->where('Q_srNo',$value['Q'])
                        ->where('answer',$value['answer'])->first();
            if(!empty($quizData))
            {
                $count++;
            }   
        }
        $score = $count;
        $storeResult = new StudentScore;
        $storeResult->testID = $request->testID;
        $storeResult->stuID = Session::get('SessionData.userId');
        $storeResult->score = $count;
        $storeResult->status = '1';
        $storeResult->save();

        return redirect()->route('score',['testid'=>$storeResult->testID]);
         
    }
    public function score(Request $request)
    {
        $student = StudentScore::where('testID',$request->testid)
        ->where('stuID',Session::get('SessionData.userId'))
        ->first();
        $subid = Test::where('id',$request->testid)->first();
        $testList = Test::where('id',$subid->subID)->get();
        $quizList = Quiz::where('testID',$request->testid)->get();
        return view('Student/Quiz/scorepage')->with(['student'=>$student,'quizList'=>$quizList,'testList'=>$testList]);
    }
    

    public function result()
    {
        $student = StudentScore::where('stuID',Session::get('SessionData.userId'))
                    ->get();
        return view('Student/result')->with(['student'=>$student]);
    }
}
