<div>
  <div class="card m-0 my-2">
    <div class="card-body">
      <div class="card-content d-flex">
        <a href="{{ route('grade.create_teacher') }}"><button class="btn btn-primary me-2">Form Penilaian Guru</button></a>
        <a href="{{ route('grade.index_teacher') }}"><button class="btn btn-primary">Hasil Nilai Semua Siswa</button></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-6">
      <div class="card m-0 my-2">
        <div class="card-content">
          <div class="card-body">
            <p class="text-center font-bold">Form Input Penilaian</p>

            <form class="form form-vertical" action="{{ route('grade.store_teacher') }}" method="POST">
              @csrf
              
              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="acakan_ke">Pembuatan Grup Keberapa</label>
                      <fieldset class="form-group">
                        <select class="form-select @error('acakanKe') is-invalid @enderror" id="acakan_ke"
                          name="acakan_ke" required wire:model="acakanKe" wire:key="acakanKe">
                          <option value='' selected>Pilih pembuatan grup keberapa...</option>
                          @foreach ($allAcakan as $item)
                            <option value='{{ $item['acakan_ke'] }}'>{{ $item['acakan_ke'] }}</option>
                          @endforeach
                        </select>
                      </fieldset>
                    </div>
                    @error('acakanKe')
                      @include('partial.invalid-form', ['message' => $message])
                    @enderror
                  </div>
                  @if ($toggleForm)
                    <div class="col-12">
                      <div class="form-group">
                        <label for="siswa">Siswa</label>
                        <fieldset class="form-group">
                          <select class="form-select @error('siswa') is-invalid @enderror" id="siswa" name="siswa"
                            required>
                            <option value='' selected>Pilih Siswa...</option>
                            @foreach ($studentNotFilled as $student)
                              <option value="{{ $student['user_id'] }}">{{ $student['nip_nis'] }} -
                                {{ $student['nama'] }}</option>
                            @endforeach
                          </select>
                        </fieldset>
                      </div>
                      @error('siswa')
                        @include('partial.invalid-form', ['message' => $message])
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="grade">Nilai (1 - 10)</label>
                      <fieldset class="form-group">
                        <select class="form-select @error('grade') is-invalid @enderror" id="grade" name="grade"
                          required>
                          <option value='' selected>Pilih Nilai...</option>
                          @for ($i = 1; $i <= 10; $i++)
                            <option value='{{ $i }}'>{{ $i }}</option>
                          @endfor
                        </select>
                      </fieldset>
                      @error('grade')
                        @include('partial.invalid-form', ['message' => $message])
                      @enderror
                      <div class="col-12 d-flex">
                        <button type="submit" class="btn btn-primary me-1 mb-1">
                          Submit
                        </button>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if ($toggleForm)
  <div class="card m-0 my-2">
    <div class="card-body">
      <div class="card-content d-flex">
        <button class="btn btn-primary me-2" wire:click="showStudentNotFilled({{ $acakanKe }})">Daftar Siswa Belum Menilai</button>
        <button class="btn btn-primary" wire:click="showStudentFilled({{ $acakanKe }})">Daftar Siswa Sudah Menilai</button>
      </div>
      <div class="table-responsive">
        <table class="table table-lg">
          <thead>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($studentCurrentTable as $key => $item)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $item['nip_nis'] }}</td>
              <td>{{ $item['nama'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endif
</div>
