@extends('layouts.dashboard.master_dashboard')

@section('main')
  <h4 class="text-center mt-3">Halaman Olah User</h4>
  <a href="{{ route('user.index') }}" class="btn btn-secondary rounded-pill my-3">Kembali</a>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Buat User</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-vertical" action="{{ route('user.store') }}" method="POST">
          @csrf
          <div class="form-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror"
                    name="nama" placeholder="Nama" required />
                </div>
                @error('nama')
                  @include('partial.invalid-form', ['message' => $message])
                @enderror
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="nip_nis">NIP / NIS</label>
                  <input type="text" id="nip_nis" class="form-control @error('nip_nis') is-invalid @enderror"
                    name="nip_nis" placeholder="NIP / NIS" required />
                </div>
                @error('nip_nis')
                  @include('partial.invalid-form', ['message' => $message])
                @enderror
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Password (Minimal 8 Karakter)" required />
                </div>
                @error('password')
                  @include('partial.invalid-form', ['message' => $message])
                @enderror
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="role">Role</label>
                  <fieldset class="form-group">
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                      required>
                      <option value='' selected>Pilih Role...</option>
                      <option value='siswa'>Siswa</option>
                      <option value='guru'>Guru</option>
                      <option value='admin'>Admin</option>
                    </select>
                  </fieldset>
                </div>
                @error('role')
                  @include('partial.invalid-form', ['message' => $message])
                @enderror
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="kelas">Kelas <i>(Opsional)</i></label>
                  <input type="text" id="kelas" class="form-control @error('kelas') is-invalid @enderror"
                    name="kelas" placeholder="Kelas (Maksimal 3 Karakter)" />
                </div>
                @error('kelas')
                  @include('partial.invalid-form', ['message' => $message])
                @enderror
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <fieldset class="form-group">
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                      name="jenis_kelamin" required>
                      <option value='' selected>Pilih Jenis Kelamin...</option>
                      <option value='Laki-laki'>Laki-laki</option>
                      <option value='Perempuan'>Perempuan</option>
                    </select>
                  </fieldset>
                </div>
                @error('jenis_kelamin')
                  @include('partial.invalid-form', ['message' => $message])
                @enderror
              </div>
              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                  Submit
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
