@extends('layouts.main')

@section('container')
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 text-center">
        <h3 class="mb-3 fw-bold">Student List</h3>
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
                <a href="{{ route('student.destroy', ['student' => $student->id]) }}" 
                  type="button" 
                  class="btn btn-danger"
                  onclick="confirmDelete('{{ $student->id }}')"> Delete </a>
              <!-- Hidden form to trigger the actual delete action -->
              <form id="delete-form-{{ $student->id }}" action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
              </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
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
