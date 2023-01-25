@extends('layouts.dashboard.master_dashboard')

@section('main')
  <h4 class="text-center mt-3">Halaman Edit Nilai</h4>
  <a href="{{ route('grade.index_teacher') }}" class="btn btn-secondary rounded-pill my-3">Kembali</a>

  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Ubah Nilai User | {{ $data->nama }} - {{ $data->nip_nis }}</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-vertical" action="{{ route('grade.update_teacher', ['id' => $data->gd_id, 'acakan_ke' => $current_acakan_ke]) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-body">
            <div class="row">
              <div class="col-12">
                <label for="grade">Nilai (1 - 10)</label>
                <fieldset class="form-group">
                  <select class="form-select @error('grade') is-invalid @enderror" id="grade" name="grade" required>
                    @for ($i = 1; $i <= 10; $i++)
                      <option value='{{ $i }}' {{ $i == $data->grade ? 'selected' : '' }}>{{ $i }}</option>
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
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection