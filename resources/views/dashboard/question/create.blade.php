@extends('layouts.dashboard.master_dashboard')

@section('main')
<h4 class="text-center mt-3">Halaman Olah Pertanyaan</h4>
<a href="{{ route('question.index') }}" class="btn btn-secondary rounded-pill my-3">Kembali</a>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Buat Pertanyaan</h4>
  </div>
  <div class="card-content">
    <div class="card-body">
      <form class="form form-vertical" action="{{ route('question.store') }}" method="POST">
        @csrf
        <div class="form-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="question"
                  >Pertanyaan</label
                >
                <input
                  type="text"
                  id="question"
                  class="form-control @error('question') is-invalid @enderror"
                  name="question"
                  placeholder="Pertanyaan"
                  required
                />
              </div>
              @error('question')
                @include('partial.invalid-form', ['message' => $message])
              @enderror
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="questionnaire_id"
                  >Sub Pertanyaan</label
                >
                <fieldset class="form-group">
                  <select class="form-select @error('questionnaire_id') is-invalid @enderror" id="questionnaire_id" name="questionnaire_id"
                  required>
                    <option value='' selected>Pilih Sub Pertanyaan...</option>
                    @foreach ($questionnaire as $item)
                    <option value='{{ $item->id }}'>{{ ucwords($item->questionnaire) }}</option>
                    @endforeach
                  </select>
                </fieldset>
              </div>
              @error('questionnaire_id')
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