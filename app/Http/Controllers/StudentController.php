<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;

class StudentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:api');
    // }

    public function index(){
        return view('pages.student.index');
    }

    public function get(){
        $data       = array();
        $students   = Student::with('school')->orderBy('school_id')->get()->groupBy(function($data) {
            return $data->school_id;
        });

        foreach ($students as $student) {
            foreach($student as $x){
                array_push($data, $x);
            }
        }

        return $data;
    }

    public function add(){
        $schools    = School::all();
        return view('pages.student.create', compact('schools'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'      =>  'required',
            'school'    =>  'required|numeric|not_in:-1',
        ],
        [
            'name.required'     =>  "Please Enter Student Name.",
            'school.required'   =>  "Please Select School.",
            'school.not_in'     =>  "Please Select School."
        ]);

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
            return redirect('/student/students')->with('success', "Student ".$request->input('name')." added successfully");
        }else{
            return redirect('/student/students')->with('fail', "Unable to add student ".$request->input('name'));
        }
    }

    public function edit($id){
        $student = Student::find($id);
        $schools = School::all();
        return view('pages.student.update', compact('student', 'schools'));
    }

    public function update(Request $request){
        $student            = Student::find($request->input('id'));
        $student->name      = $request->input('name');
        $student->school_id = $request->input('school');
        $student->save();

        if($student){
            return redirect('/student/students')->with('success', "Student ".$request->input('name')." updated successfully");
        }else{
            return redirect('/student/students')->with('fail', "Unable to update student ".$request->input('name'));
        }
    }

    public function destroy(Request $request){
        $student = Student::find($request->input('id'));
        $student->delete();

        if($student){
            return true;
        }else{
            return false;
        }
    }
}
