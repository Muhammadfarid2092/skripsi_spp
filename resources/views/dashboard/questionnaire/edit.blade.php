@extends('layouts.dashboard.master_dashboard')

@section('main')
<h4 class="text-center mt-3">Halaman Olah Sub Pertanyaan</h4>
<a href="{{ route('question.index') }}" class="btn btn-secondary rounded-pill my-3">Kembali</a>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Ubah Sub Pertanyaan</h4>
  </div>
  <div class="card-content">
    <div class="card-body">
      <form class="form form-vertical" action="{{ route('questionnaire.update', $questionnaire->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="questionnaire"
                  >Sub Pertanyaan</label
                >
                <input
                  type="text"
                  id="questionnaire"
                  class="form-control @error('questionnaire') is-invalid @enderror"
                  name="questionnaire"
                  placeholder="Sub Pertanyaan"
                  required
                  value='{{ $questionnaire->questionnaire }}'
                />
              </div>
              @error('questionnaire')
                @include('partial.invalid-form', ['message' => $message])
              @enderror
            </div>
            <div class="col-12 d-flex justify-content-end">
              <button
                type="submit"
                class="btn btn-primary me-1 mb-1"
              >
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