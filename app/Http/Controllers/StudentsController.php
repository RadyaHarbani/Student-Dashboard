<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.all', ["title" => "Students", "students" => $students]);
    }

    public function show(Student $student)
    {
        return view('student.detail', ["title" => "Student Detail", "student" => $student]);
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('student.addData', ["title" => "Create New Data", "kelas" => $kelas]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|integer',
            'alamat' => 'required',
        ]);

        $result = Student::create($validatedData);

        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Data added successfully');
        } else {
            return back()->with('error', 'Failed to add data');
        }
    }

    public function destroy(Student $student)
    {
        $result = $student->delete();

        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Data deleted successfully');
        } else {
            return back()->with('error', 'Failed to delete data');
        }
    }

    public function edit(Student $student)
    {
        $kelas = Kelas::all();
        return view('student.editData', [
            "title" => "Edit Data",
            "student" => $student,
            "kelas" => $kelas
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = $student->update($validatedData);

        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Data updated successfully');
        } else {
            return back()->with('error', 'Failed to update data');
        }
    }
}
