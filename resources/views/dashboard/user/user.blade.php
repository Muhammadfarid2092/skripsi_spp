@extends('layouts.dashboard.master_dashboard')

@section('main')
    <h1>Ini Halaman Index User</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIS / NIP</th>
            <th>Role</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nip_nis }}</td>
            <td>{{ $item->role }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('user.create') }}" class="btn btn-secondary rounded-pill">Create</a>
    <a href="{{ route('user.edit') }}" class="btn btn-secondary rounded-pill">Edit</a>
@endsection
