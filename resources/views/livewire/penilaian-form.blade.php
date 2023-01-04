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

        @if ($toggleUserDinilai)
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="user_dinilai">Siswa yang Akan Dinilai</label>
              <fieldset class="form-group">
                <select class="form-select @error('userDinilai') is-invalid @enderror" id="user_dinilai"
                  name="user_dinilai" required wire:model="userDinilai" wire:key="userDinilai">
                  <option value='' selected>Pilih Siswa yang Akan Dinilai...</option>
                  @foreach ($allUserByGroupAndAcakanKe as $item)
                    @if ($idLogin == $item['user_id'])
                      <option
                        class="text-success font-bold {{ in_array($item['user_id'], $personFilled, true) ? 'bg-disabled-option' : '' }}"
                        value='{{ $item['user_id'] }}'
                        {{ in_array($item['user_id'], $personFilled, true) ? '' : '' }}>{{ $item['nama'] }}
                        (Diri
                        Sendiri)</option>
                    @else
                      <option class="{{ in_array($item['user_id'], $personFilled, true) ? 'bg-disabled-option' : '' }}"
                        value='{{ $item['user_id'] }}'
                        {{ in_array($item['user_id'], $personFilled, true) ? '' : '' }}>{{ $item['nama'] }}
                      </option>
                    @endif
                  @endforeach
                </select>
              </fieldset>
            </div>
            @error('userDinilai')
              @include('partial.invalid-form', ['message' => $message])
            @enderror
          </div>
        @endif

      </div>
    </div>
  </div>

  @if ($toggleKuesioner)
    <button class="btn btn-primary mb-3" onclick="refreshForm()">Refresh Form</button>

    <form class="form" action="{{ route('grade.store') }}" method="POST">
      @csrf

      <input type="hidden" id="penilai" name="penilai" value="{{ $idLogin }}">
      <input type="hidden" id="dinilai" name="dinilai" value="{{ $keyUserDinilai }}">
      <input type="hidden" id="acakan_ke" name="acakan_ke" value="{{ $keyAcakanKe }}">

      @for ($i = 0; $i < count($dataKuesioner); $i++)
        <div class="card m-0">
          <div class="card-content">
            <div class="card-body">
              <p class="m-0 font-bold">{{ ucwords($dataKuesioner[$i]['sub_pertanyaan']) }}</p>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-lg">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Pertanyaan</th>
                <th class="text-center">Jawaban</th>
              </tr>
            </thead>
            <tbody>
              @for ($j = 0; $j < count($dataKuesioner[$i]['data_question']); $j++)
                <input type="hidden" name="question_id[]" value="{{ $dataKuesioner[$i]['data_question'][$j]['id'] }}">

                <tr>
                  <td>{{ $j + 1 }}</td>
                  <td>{{ $dataKuesioner[$i]['data_question'][$j]['question'] }}</td>
                  <td>
                    <div class="d-flex">
                      @for ($k = 1; $k <= 10; $k++)
                        <div class="form-check d-flex flex-column justify-content-center align-items-center">
                          <input class="form-check-input m-0" type="radio"
                            name="{{ $dataKuesioner[$i]['sub_pertanyaan'] }}_{{ $j }}"
                            id="{{ $dataKuesioner[$i]['sub_pertanyaan'] }}_{{ $j }}_{{ $k }}"
                            value={{ $k }} required>
                          <label class="form-check-label"
                            for="{{ $dataKuesioner[$i]['sub_pertanyaan'] }}_{{ $j }}_{{ $k }}">
                            {{ $k }}
                          </label>
                        </div>
                      @endfor
                    </div>
                  </td>
                </tr>
              @endfor
            </tbody>
          </table>
        </div>
      @endfor
      <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-1 mb-1">
          Submit
        </button>
      </div>
    </form>
  @endif
</div>
