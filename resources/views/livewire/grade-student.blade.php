<div>
  <div class="form form-vertical">
    <div class="form-body">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="form-group">
            <label for="acakan_ke">Pembuatan Grup Keberapa</label>
            <fieldset class="form-group">
              <select class="form-select @error('acakanKe') is-invalid @enderror" id="acakan_ke" name="acakan_ke" required
                wire:model="acakanKe" wire:key="acakanKe">
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
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-lg">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>999</td>
          <td>Galih Redha Saputra</td>
          <td>A</td>
        </tr>
        <tr>
          <td>1</td>
          <td>999</td>
          <td>Farid Kun</td>
          <td>A</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
