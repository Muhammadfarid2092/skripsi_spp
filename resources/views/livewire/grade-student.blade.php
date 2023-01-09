<div>
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
    @if ($toggleCard)
      <div class="card mt-3">
        <div class="card-body">
          <div class="card-content">
            <div class="d-flex flex-column justify-content-center align-items-center m-4">
              @if (array_key_exists('is_mengisi', $resultData))
                @if ($resultData['is_mengisi'])
                  <p class="fw-bold text-danger">“Maaf, Anda belum bisa melihat nilaimu karena anda belum mengisi form penilaian. Silakan isi form kuesioner terlebih dahulu agar anda dapat menampilkan nilaimu"</p>
                @else
                  <p class="fw-bold text-danger">"Maaf, Anda tidak bisa melihat nilaimu karena beberapa siswa lain belum mengisi form penilaian. Silakan cek kembali nanti setelah semua siswa telah mengisi form kuesioner."</p>
                @endif
              @elseif (array_key_exists('is_not_filled_guru', $resultData))
                <p class="fw-bold text-danger">"Maaf, Anda tidak bisa melihat nilaimu karena guru belum mengisi form kuesioner. Silakan cek kembali nanti setelah guru telah mengisi form kuesioner atau tanyakan langsung kepada guru untuk informasi lebih lanjut."</p>
              @else
                <p class="fw-bold">Nilai</p>
                <p style="font-size: 30px;" class="fw-bold">{{ $resultData['grade_alphabet'] }}</p>
                <p class="fw-bold">Dengan Skor : {{ $resultData['score']}} / {{ $resultData['skala_nilai'] }}</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
