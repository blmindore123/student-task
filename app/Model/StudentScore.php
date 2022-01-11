<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model{

    protected  $primaryKey = 'id';
    protected $table = 'student_score';

    protected $fillable = ['id','student_id','class_id','hindi','english','maths','science','social_science','created_at','updated_at'];

    protected $appends = ['total_score'];
    public function getTotalScoreAttribute(){

      $hindi = isset($this->hindi)?$this->hindi:0;
      $english = isset($this->english)?$this->english:0;
      $maths = isset($this->maths)?$this->maths:0;
      $science = isset($this->science)?$this->science:0;
      $social_science = isset($this->social_science)?$this->social_science:0;
      return $hindi+$english+$maths+$science+$social_science;
    }

    public function student(){
        return $this->belongsTo('App\Model\Student','student_id');
    }
    
}