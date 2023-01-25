@extends('layouts.dashboard.master_dashboard')

@section('main')
  @include('partial.notification')

  <h4 class="text-center mt-3">Halaman Olah Pertanyaan</h4>
  <a href="{{ route('questionnaire.create') }}" class="btn btn-secondary rounded-pill my-3">Buat Kategori Baru</a>
  <a href="{{ route('question.create') }}" class="btn btn-secondary rounded-pill my-3">Buat Pertanyaan Baru</a>
  <h5 class="text-center">Daftar Semua Pertanyaan</h5>
  @foreach ($result as $key => $questionnaire)
  <div class="card m-0">
    <div class="card-content">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <p class="m-0 font-bold">{{ ucwords($questionnaire['questionnaire']) }}</p>
          <div class="btn-group me-1 mb-1">
            <div class="dropdown">
              <button type="button" class="btn btn-secondary dropdown-toggle rounded-pill" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Aksi
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('questionnaire.edit', $questionnaire['id']) }}">Edit</a>
                <form onsubmit="return confirm('Ingin Menghapus Sub Pertanyaan {{ ucwords($questionnaire['questionnaire']) }} ?');"
                  action="{{ route('questionnaire.destroy', $questionnaire['id']) }}" method="POST">
                  @csrf
                  @method('DELETE')
  
                  <button type="submit" class="dropdown-item">
                    Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-lg">
      <thead>
        <tr>
          <th>No</th>
          <th>Pertanyaan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result[$key]['question'] as $key => $question)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td style="width: 100%;">{{ $question['question'] }}</td>
            <td>
              <div class="d-flex justify-content-around">
                {{-- Update --}}
                <a href="{{ route('question.edit', $question['id']) }}">
                  <button class="btn btn-secondary rounded-pill">Edit</button>
                </a>
                {{-- Delete --}}
                <form onsubmit="return confirm('Ingin Menghapus Pertanyaan Ini ?');"
                  action="{{ route('question.destroy', $question['id']) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-secondary rounded-pill ms-2">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endforeach
@endsection
