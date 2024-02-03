@extends('layouts.main')

@section('container')
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 text-center">
        <h3 class="mb-3 fw-bold">List Kelas</h3>
        <a href="{{ route('kelas.create') }}" class="btn btn-warning mb-4">Tambah Kelas</a>
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
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kelas as $kelas)
            <tr>
              <th scope="row">{{$kelas["id"]}}</th>
              <td>{{$kelas["nama_kelas"]}}</td>
              <td>
                
                <a href="/kelas/{{ $kelas->id }}/edit" class="btn btn-warning">Edit</a>
                <a href="{{ route('kelas.destroy', ['kelas' => $kelas->id]) }}" 
                  type="button" 
                  class="btn btn-danger"
                  onclick="confirmDelete('{{ $kelas->id }}')"> Delete </a>
              <!-- Hidden form to trigger the actual delete action -->
              <form id="delete-form-{{ $kelas->id }}" action="{{ route('kelas.destroy', ['kelas' => $kelas->id]) }}" method="POST" style="display: none;">
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
