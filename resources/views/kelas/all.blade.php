@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-12 text-center">
        <h3 class="mb-3 fw-bold">List Kelas</h3>
    </div>
    <div class="row justify-content-center">
        <table class="table" style="width: 1000px;">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)
                <tr>
                    <th scope="row">{{ $item["id"] }}</th>
                    <td>{{ $item["nama_kelas"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
