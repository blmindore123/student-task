<?php

namespace App\Model;
use App\Model\Classes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    protected  $primaryKey = 'id';
    protected $table = 'students';

    protected $fillable = ['id','name','roll_number','class','image','score','created_at','updated_at'];
    protected $appends = ['image_url'];
    public function classDetails(){
        return $this->hasOne(Classes::class,'id','class');
    }
    public function studentScore(){
        return $this->hasOne(StudentScore::class,'student_id','id');
    }
    
    public function getImageUrlAttribute(){
        if(!empty($this->image)){
            return url('public/uploads/student/').'/'.$this->image;  
        }else{
            return url('public/uploads/default.png'); 
        }
    }
}