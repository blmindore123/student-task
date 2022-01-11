<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DataTables;
class StudentController extends Controller {

  /**
     * Show the application tournament.
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct(StudentRepository $studentRepository){   
        $this->studentRepository = $studentRepository;
    }
       /**
     * Function : getData
     * Desc : get student data
     */
    public function getData(Request $request){ 
        try {
            $students = $this->studentRepository->getStudentList($request);
            return datatables()->of($students)->toJson();
        } catch (\Exception $e) {
            return redirect('dashboard')->with('error',$e->getMessage());
        }
    }
    /**
     * Function : create
     * Desc : student create view
     */
    public function create(){
        $classes = $this->studentRepository->getClassesList();
        $subjects = $this->studentRepository->getClassesList();
        return view('student.create',compact('classes','subjects'));
    }
    /**
     * Function : store
     * Desc : save student data
     */
    public function store(StudentRequest $request){
        try {
            return $this->studentRepository->store($request);
        } catch (\Exception $e) {
            return ['status'=>false,'message'=>$e->getMessage(),'errors'=>array('message'=>$e->getMessage())];
        }
    }
   

    /**
     * Function : getStudents
     * Desc : get student data
     */
    public function getStudents(Request $request){
        try {
            return $this->studentRepository->getStudents($request);
        } catch (\Exception $e) {
            return ['status'=>false,'message'=>$e->getMessage(),'errors'=>array('message'=>$e->getMessage())];
        }
    }

     /**
     * Function : show score
     * Desc : student show score
     */
    public function showScore($id){
         $marks = $this->studentRepository->getStudentScores($id);
        
        return view('student.show_score',compact('marks'));
    }
}