@extends('dashboard.dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="mb-3 fw-bold">Student List</h3>
            <form action="/dashboard/student">
                <div class="input-group  mb-3">
                    <input type="text" class="form-control " placeholder="Search" name="search"
                        value="{{request('search')}}">
                    <button class="btn btn-info  bg-success" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
            <a href="{{ route('student.create') }}" class="btn btn-warning mb-4">Add Data</a>
        </div>
    </div>

    @if (session()->has('success'))
    <div id="success-alert" class="alert alert-success col-lg-12" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif

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
                    <th scope="row">{{$student["id"]}}</th>
                    <td>{{$student["nis"]}}</td>
                    <td>{{$student["nama"]}}</td>
                    <td>{{$student->kelas->nama_kelas}}</td>
                    <td>
                        <a href="/students/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                        <a href="/students/{{ $student->id }}/edit" class="btn btn-warning">Edit</a>
                        <a href="{{ route('student.destroy', ['student' => $student->id]) }}" type="button"
                            class="btn btn-danger" onclick="confirmDelete('{{ $student->id }}')"> Delete </a>

                        <form id="delete-form-{{ $student->id }}"
                            action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item {{ $students->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $students->previousPageUrl() }}" tabindex="-1"
                        aria-disabled="true">
                        <span aria-hidden="true">&laquo;</span> Previous
                    </a>
                </li>

                @foreach ($students as $student)
                <li class="page-item {{ $students->currentPage() == $loop->index + 1 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $students->url($loop->index + 1) }}">{{ $loop->index + 1 }}</a>
                </li>
                @endforeach

                <li class="page-item {{ $students->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $students->nextPageUrl() }}">
                        Next <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    // Menghilangkan pesan setelah 5 detik
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 5000);

    function confirmDelete(studentId) {
        var result = confirm("Are you sure you want to delete this student?");
        if (result) {
            event.preventDefault();
            document.getElementById('delete-form-' + studentId).submit();
        } else {
            event.preventDefault();
        }
    }
</script>
@endsection
