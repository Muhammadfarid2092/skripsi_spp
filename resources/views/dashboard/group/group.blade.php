@extends('layouts.dashboard.master_dashboard')

@section('main')
  @include('partial.notification')

  <h4 class="text-center mt-3">Halaman Olah Grup</h4>
  <form action="{{ route('group.store') }}" method="POST">
    @csrf

    <button type="submit" class="btn btn-secondary rounded-pill ms-2">
      Acak Grup
    </button>
  </form>
  <h5 class="text-center">Daftar Semua Group</h5>
  <div class="row" id="basic-table">
    @foreach ($data as $item)
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <p class="my-1 font-bold text-center">Group Acakan ke {{ $item['acakan_ke'] }}</p>
              <form onsubmit="return confirm('Ingin Menghapus Group Acakan Ke {{ $item['acakan_ke'] }} ?');"
                action="{{ route('group.destroy', $item['acakan_ke']) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-secondary rounded-pill ms-2">
                  Hapus Grup
                </button>
              </form>

              {{-- Table --}}
              <div class="table-responsive">
                <table class="table mb-0 table-lg">
                  <thead>
                    <tr>
                      <th>Kelompok</th>
                      <th>Nama Siswa</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($item['data'] as $banyaknyaGroup)
                      @foreach ($banyaknyaGroup['siswa'] as $key => $siswa)
                      @if ($key == 0)
                        <tr class="custom-border-top-group">
                      @elseif ($key == count($banyaknyaGroup['siswa']) - 1)
                        <tr class="custom-border-bottom-group">
                      @else
                        <tr>
                      @endif
                          @if ($key == 0)
                            <td rowspan="{{ $banyaknyaGroup['banyak_orang_per_grup'] }}" class="text-center">
                              {{ $banyaknyaGroup['nama_group'] }}</td>
                          @endif
                          <td style="width: 100%;">{{ $siswa->nama }}</td>
                        </tr>
                      @endforeach
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
