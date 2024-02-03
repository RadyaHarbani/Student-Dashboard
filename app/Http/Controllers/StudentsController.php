<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        return view('student.all', ["title" => "Students", "students" => Student::all()]);
    }

    public function show($student)
    {
        return view('student.detail', ["title" => "Student Detail", "student" => Student::find($student)]);
    }

    public function create()
    {
        return view('student.addData', ["title" => "create-new-data", "kelas" => Kelas::all()]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|integer',
            'alamat' => 'required',
        ]);
        $result = Student::create($validateData);
        if ($result) {
            return redirect('/students/all')->with('success', 'Data added successfully');
        } else {
            return back()->with('error', 'Failed to add data');
        }
    }

    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/students/all')->with('success', 'Data deleted successfully');
        } else {
            return back()->with('error', 'Failed to delete data');
        }
    }

    public function edit(Student $student)
    {
        return view('student.editData', [
            "title" => "Edit Data",
            "student" => $student,
            "kelas" => Kelas::all()
        ]);
    }

    public function update(Request $request, Student $student)
    {
        // Validasi input
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        // Update data
        $result = Student::where('id', $student->id)->update($validateData);

        // Cek apakah data berhasil diupdate
        if ($result) {
            return redirect('/students/all')->with('success', 'Data updated successfully');
        } else {
            return back()->with('error', 'Failed to update data');
        }
    }
}
