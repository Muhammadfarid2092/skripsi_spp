@extends('layouts.dashboard.master_dashboard')

@section('main')
  @include('partial.notification')

  <h4 class="text-center mt-3">Halaman Olah User</h4>
  <a href="{{ route('user.create') }}" class="btn btn-secondary rounded-pill my-3">Buat User Baru</a>
  <h5 class="text-center">Daftar Semua User</h5>
  <div class="table-responsive">
    <table class="table table-lg">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIS / NIP</th>
          <th>Role</th>
          <th>Kelas</th>
          <th>Jenis Kelamin</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $key => $item)
        <tr>
          <td>{{  $key+1 }}</td>
          <td>{{ ucwords($item->nama) }}</td>
          <td>{{ $item->nip_nis }}</td>
          <td>{{ $item->role }}</td>
          <td>{{ $item->kelas }}</td>
          <td>{{ $item->jenis_kelamin }}</td>
          <td>
            <div class="d-flex justify-content-around">
              {{-- Update --}}
              <a href="{{ route('user.edit', $item->id) }}">
                <button class="btn btn-secondary rounded-pill">Edit</button>
              </a>
              {{-- Delete --}}
              <form onsubmit="return confirm('Ingin Menghapus User {{ ucwords($item->nama) }} ?');"
                action="{{ route('user.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-secondary rounded-pill ms-2">
                  Hapus
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
