<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function student()
    {
        $students = Student::latest()->filter(request(['search']))->paginate(9);

        return view('dashboard.student', [
            "title" => "Student Page",
            "students" => $students
        ]);
    }

    public function kelas()
    {
        $kelas = Kelas::all();

        return view('dashboard.kelas', [
            'kelas' => $kelas
        ]);
    }
}
