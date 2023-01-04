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
        @if ($toggleForm)
          <form class="form form-vertical" action="{{ route('grade.store_teacher') }}" method="POST">
            @csrf
            <input type="hidden" name="acakan_ke" id="acakan_ke" value="{{ $acakanKe }}">

            <div class="form-body">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="siswa">Siswa</label>
                    <fieldset class="form-group">
                      <select class="form-select @error('siswa') is-invalid @enderror" id="siswa" name="siswa"
                        required>
                        <option value='' selected>Pilih Siswa...</option>
                        <option value=''>1</option>
                        <option value=''>2</option>
                        <option value=''>3</option>
                      </select>
                    </fieldset>
                  </div>
                  @error('siswa')
                    @include('partial.invalid-form', ['message' => $message])
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-6">
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
              </div>
              <div class="row">
                <div class="col-12 d-flex">
                  <button type="submit" class="btn btn-primary me-1 mb-1">
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form>
        @endif
      </div>
    </div>
  </div>
</div>
