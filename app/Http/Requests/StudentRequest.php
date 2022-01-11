<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'roll_number' => 'required|unique:students',
            'name'=>'required',
            'image' => 'required',
            'class' => 'required',
            'hindi'=>'required|numeric',
            'english'=>'required|numeric',
            'maths'=>'required|numeric',
            'science'=>'required|numeric',
            'social_science'=>'required|numeric',
            
         ];
       
        
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        $marks = 'Please enter marks';
        return [
            'roll_number.required'=>'Please enter roll number',
            'name.required'=>'Please enter student name',
            'image.required'=>'Please enter image',
            'class.required'=>'Please select class',
            'hindi.required'=>$marks,
            'english.required'=>$marks,
            'maths.required'=>$marks,
            'science.required'=>$marks,
            'social_science.required'=>$marks
        ];
    }
}