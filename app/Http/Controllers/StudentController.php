<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    public function index() {
        $students = Students::paginate(4);

        return view('welcome', compact('students'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $students = new Students;
        $students->first_name = $request->firstName;
        $students->last_name = $request->lastName;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->save();

        return redirect(route('home'))->with('successMsg', 'Students Added Successfully');
    }

    public function edit($id) {
        $student = Students::find($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $students = Students::find($id);
        $students->first_name = $request->firstName;
        $students->last_name = $request->lastName;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->save();

        return redirect(route('home'))->with('successMsg', 'Students Updated Successfully');
    }

    public function delete($id) {
        Students::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'Students Deleted Successfully');
    }
}
