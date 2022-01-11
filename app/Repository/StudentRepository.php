<?php 
namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Model\Student;
use App\Model\Classes;
use App\Model\StudentScore;
use App\Helpers\imageHelper;
use Illuminate\SuTeamspport\Facades\Storage;

class StudentRepository {

    public function __construct(Student $student,Classes $class,StudentScore $studentScore){
        $this->class = $class;
        $this->student = $student;
        $this->studentScore = $studentScore;
    }

    /**
     * Function : getStudentList
     * Desc : get all student list
     */
    public function getStudentList(){
        return $this->student->orderBy('score','desc')->get();
    }
    /**
     * Function : getStudentScores
     * Desc : get student score
     */
    public function getStudentScores($studentId){
        return $this->studentScore->with('student')->where('student_id',$studentId)->first();
    }
    /**
     * Function : getClassesList
     * Desc: get classes list
     */
    public function getClassesList(){
        return $this->class->where('status','!=','deleted')->orderBy('id','asc')->get();
    }
    /**
     * Function : store
     * Desc : save student data
     */
    public function store($request){
        $image='';
        if(isset($request['image']) && !empty($request['image'])){
            $image  = uploadImage($request['image'],'student');
        }
        $requestData = ['name' => ucfirst($request->name),'roll_number'=>$request['roll_number'],'class'=>$request['class'],'image'=>$image];
        $student = $this->student->create($requestData);
        if(!empty($student)){
            $scoreData['student_id']        = $student['id'];
            $scoreData['class_id']          = $request['class'];
            $scoreData['hindi']             = $request['hindi'];
            $scoreData['english']           = $request['english'];
            $scoreData['maths']             = $request['maths'];
            $scoreData['science']           = $request['science'];
            $scoreData['social_science']    = $request['social_science'];
            $this->studentScore->create($scoreData);
            $student->score = $this->calculateScore($request);
            $student->save();
            return ['status'=>true,'message'=>'Student Information added successfully','error'=>'','data'=>[]];
        }else{
            return ['status'=>false,'message'=>'Something went wrong !!','error'=>array('message'=>'Something went wrong !!')];
        }
    }
    /**
     * Function : calculateScore
     * Desc: calculate score
     */
    public function calculateScore($request){
        return ($request['hindi'] + $request['english'] + $request['maths'] + $request['science'] + $request['social_science'])/5;
    }

    /**
     * Function : getStudents
     * Desc : get students data
     */
    public function getStudents($request){
        $students = $this->student->select('id','name','roll_number','class','image')
                            ->where(function($query) use($request){
                                if(isset($request['class']) && !empty($request['class'])){
                                    $query->where('class',$request['class']);
                                }
                                if(isset($request['roll_number']) && !empty($request['roll_number'])){
                                    $query->where('roll_number',$request['roll_number']);
                                }
                            })
                            ->with(['classDetails:id,name'])
                            ->with(['studentScore:id,student_id,hindi,english,maths,science,social_science'])
                            ->orderBy('score','desc')->paginate(10);
       return ['status'=>true,'message'=>'','error'=>'','data'=>$students];
    }
     
}