@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-12 text-center">
        <h3 class="mb-5 fw-bold">Student List</h3>
    </div>
    <div class="row justify-content-center">
        <table class="table" style="width: 1000px;">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->kelas->nama_kelas }}</td>
                    <td>
                        <a href="/students/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
