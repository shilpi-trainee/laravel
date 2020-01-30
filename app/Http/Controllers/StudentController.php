<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        die("hii");
        $students = Student::paginate(3);
//        dd($students);
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd("hii");
        return view('student.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'    =>  'required|min:3',
            'last_name'     =>  'required',
            'image'         =>  'required'
        ]);
        $student = new Student([
            'first_name'    =>  $request->get('first_name'),
            'last_name'     =>  $request->get('last_name'),
            'image'         =>  $request->get('image')
        ]);
        $student->save();
        return redirect()->route('student.create')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('auth.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("hii");
         $student = Student::find($id);
        return view('student.edit', compact('student', 'id'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
             'image'        =>  'required'
        ]);
        $student = Student::find($id);
        $student->first_name = $request->get('first_name');
        $student->last_name  = $request->get('last_name');
        $student->image      = $request->get('image');

        $student->save();
        return redirect()->route('student.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("hello");
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Data Deleted');
    }
    public function delete($id)
    {
//        dd("hellodelete");
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Data Deleted');
    }
}
