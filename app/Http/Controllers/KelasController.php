<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.all', ["title" => "kelas", "kelas" => Kelas::all()]);
    }

    public function show($kelas)
    {
        return view('kelas.detail', ["title" => "Kelas Detail", "kelas" => Kelas::find($kelas)]);
    }

    public function create()
    {
        return view('kelas.addData', ["title" => "create-new-data"]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kelas' => 'required',
        ]);
        $result = Kelas::create($validateData);
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Data added successfully');
        } else {
            return back()->with('error', 'Failed to add data');
        }
    }

    public function destroy(Kelas $kelas)
    {
        $result = Kelas::destroy($kelas->id);
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Data deleted successfully');
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
        // Validasi input
        $validateData = $request->validate([
            'nama_kelas' => 'required',
        ]);

        // Simpan data ke dalam database
        $result = Kelas::where('id', $kelas->id)->update($validateData);
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Data updated successfully');
        } else {
            return back()->with('error', 'Failed to update data');
        }
    }
}
