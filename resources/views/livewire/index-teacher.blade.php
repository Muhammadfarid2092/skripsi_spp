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
    <div class="col-12">
      <div class="form-group">
        <label for="acakan_ke">Pembuatan Grup Keberapa</label>
        <fieldset class="form-group">
          <select class="form-select" id="acakan_ke"
            name="acakan_ke" required wire:model="acakanKe" wire:key="acakanKe">
            <option value='' selected>Pilih pembuatan grup keberapa...</option>
            @foreach ($allAcakan as $item)
              <option value='{{ $item['acakan_ke'] }}'>{{ $item['acakan_ke'] }}</option>
            @endforeach
          </select>
        </fieldset>
      </div>
    </div>
  </div>
</div>
