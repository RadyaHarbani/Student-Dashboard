<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.all', ["title" => "Kelas", "kelas" => $kelas]);
    }

    public function show($kelasId)
    {
        $kelas = Kelas::find($kelasId);
        return view('kelas.detail', ["title" => "Kelas Detail", "kelas" => $kelas]);
    }

    public function create()
    {
        return view('kelas.addData', ["title" => "Create New Data"]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
        ]);

        $result = Kelas::create($validatedData);

        if ($result) {
            return redirect('/dashboard/kelas')->with('success', 'Data added successfully');
        } else {
            return back()->with('error', 'Failed to add data');
        }
    }

    public function destroy(Kelas $kelas)
    {
        $result = $kelas->delete();

        if ($result) {
            return redirect('/dashboard/kelas')->with('success', 'Data deleted successfully');
        } else {
            return back()->with('error', 'Failed to delete data');
        }
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.editData', [
            "title" => "Edit Data",
            "kelas" => $kelas
        ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
        ]);

        $result = $kelas->update($validatedData);

        if ($result) {
            return redirect('/dashboard/kelas')->with('success', 'Data updated successfully');
        } else {
            return back()->with('error', 'Failed to update data');
        }
    }
}
