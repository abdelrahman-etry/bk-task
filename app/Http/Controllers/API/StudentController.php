<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Student as StudentResource;
use App\Models\Student;
use Validator;

class StudentController extends BaseController
{
    public function index(){
        $data       = array();
        $students   = Student::with('school')->orderBy('school_id')->get()->groupBy(function($data) {
            return $data->school_id;
        });

        foreach ($students as $student) {
            foreach($student as $x){
                array_push($data, $x);
            }
        }

        return $this->handleResponse(StudentResource::collection($data), 'Students have been retrieved!');
    }

    public function store(Request $request){
        $input      = $request->all();
        $validator  = Validator::make($input, [
            'name'      => 'required',
            'school'    => 'required|numeric|not_in:-1',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }

        $student            = new Student;
        $student->name      = $request->input('name');
        $student->school_id = $request->input('school');

        $get_last_order = Student::orderBy('order', 'desc')->where('school_id', $request->input('school'))->first();
        
        if($get_last_order){
            $student->order = $get_last_order->order + 1;
        }else{
            $student->order = 1;
        }

        $student->save();

        if($student){
            return $this->handleResponse(new StudentResource($student), "Student ".$request->input('name')." added successfully");
        }else{
            return $this->handleResponse(new StudentResource($student), "Unable to add student ".$request->input('name'));
        }
    }

    public function show($id){
        $student = Student::find($id);
        
        if(is_null($student)) {
            return $this->handleError('Student not found!');
        }

        return $this->handleResponse(new StudentResource($student), 'Student retrieved.');
    }

    public function update(Request $request, Student $student)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }

        $student            = Student::find($request->input('id'));
        
        if($request->has('name')){
            $student->name      = $request->input('name');
        }

        if($request->has('school')){
            $student->school_id = $request->input('school');
        }
        
        $student->save();

        if($student){
            return $this->handleResponse(new TaskResource($task), "Student updated successfully");
        }else{
            return $this->handleResponse(new TaskResource($task), "Unable to update student");
        }
    }

    public function destroy(Student $student){
        $student->delete();

        if($student){
            return $this->handleResponse([], 'Student deleted successfully.');
        }else{
            return $this->handleResponse([], 'Unable to delete student.');
        }
    }
}
