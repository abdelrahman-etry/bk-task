<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        return view('pages.school.index');
    }

    public function get(){
        return School::all();
    }

    public function add(){
        return view('pages.school.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' =>  'required',
        ]);

        $school         = new School;
        $school->name   = $request->input('name');

        if($request->has('status')){
            $school->status   = 1;
        }else{
            $school->status   = 0;
        }

        $school->save();

        if($school){
            return redirect('/school/schools')->with('success', "School ".$request->input('name')." added successfully");
        }else{
            return redirect('/school/schools')->with('fail', "Unable to add school ".$request->input('name'));
        }
    }

    public function edit($id){
        $school = School::find($id);
        return view('pages.school.update', compact('school'));
    }

    public function update(Request $request){
        $school         = School::find($request->input('id'));
        $school->name   = $request->input('name');
        
        if($request->has('status')){
            $school->status   = 1;
        }else{
            $school->status   = 0;
        }
        
        $school->save();

        if($school){
            return redirect('/school/schools')->with('success', "School ".$request->input('name')." updated successfully");
        }else{
            return redirect('/school/schools')->with('fail', "Unable to update school ".$request->input('name'));
        }
    }

    public function destroy(Request $request){
        $school = School::find($request->input('id'));
        $school->delete();

        if($school){
            return true;
        }else{
            return false;
        }
    }
}
