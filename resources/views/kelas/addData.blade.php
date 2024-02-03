@extends('layouts.main')

@section('container')
  <div class="container mt-5">
    <h3>Tambah Kelas</h3>
    <form action="{{route('kelas.store')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required value="{{ old('nama_kelas') }}">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/kelas/all" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection
