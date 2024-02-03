@extends('layouts.main')

@section('container')
    <h3 class="mx-auto p-2 mt-5" style="width: 200px;">Tentang Saya</h3>
    <table class="table mx-auto p-2" style="width: 800px;">
        <tr>
            <td>Nama</td>
            <td>{{$nama}}</td>
        
        </tr>
        <tr>
            <td>Kelas</td>
            <td>{{$kelas}}</td>
            
        </tr>
        <tr>
            <td>Foto</td>
            <td><Img src={{$foto}} width="100"></td>
        </tr>
    </table>
@endsection