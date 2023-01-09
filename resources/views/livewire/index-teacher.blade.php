<div>
  <div class="card m-0 my-2">
    <div class="card-body">
      <div class="card-content d-flex">
        <a href="{{ route('grade.create_teacher') }}"><button class="btn btn-primary me-2">Form Penilaian
            Guru</button></a>
        <a href="{{ route('grade.index_teacher') }}"><button class="btn btn-primary">Hasil Nilai Semua Siswa</button></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="form-group">
        <label for="acakan_ke">Pembuatan Grup Keberapa</label>
        <fieldset class="form-group">
          <select class="form-select" id="acakan_ke" name="acakan_ke" required wire:model="acakanKe"
            wire:key="acakanKe">
            <option value='' selected>Pilih pembuatan grup keberapa...</option>
            @foreach ($allAcakan as $item)
              <option value='{{ $item['acakan_ke'] }}'>{{ $item['acakan_ke'] }}</option>
            @endforeach
          </select>
        </fieldset>
      </div>
    </div>
    @if ($toggleTable)
      <div class="table-responsive">
        <table class="table table-lg">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIS</th>
              <th>Skor</th>
              <th>Nilai</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($resultData as $key => $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['nis'] }}</td>
                @if (array_key_exists('is_mengisi', $item) || array_key_exists('is_not_filled_guru', $item))
                  <td> - </td>
                  <td> - </td>
                @else
                  <td style="min-width: 110px;">{{ $item['score'] }} / {{ $item['skala_nilai'] }}</td>
                  <td>{{ $item['grade_alphabet'] }}</td>
                @endif
                @if (array_key_exists('is_mengisi', $item))
                  @if ($item['is_mengisi'])
                    <td class="text-danger">Ada teman Kelompok yang belum mengisi semua nilai</td>
                  @else
                    <td class="text-danger">Siswa ini belum mengisi semua nilai</td>
                  @endif
                @elseif (array_key_exists('is_not_filled_guru', $item))
                  <td class="text-danger">Guru belum menginput nilai kepada siswa ini</td>
                @else
                  <td> - </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</div>
