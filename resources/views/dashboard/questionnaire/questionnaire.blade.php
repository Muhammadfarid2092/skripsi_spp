@extends('layouts.dashboard.master_dashboard')

@section('main')
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <!-- table hover -->
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th class="text-center">NAMA SISWA</th>
                  <th class="text-center">NIS</th>
                  <th class="text-center">EMAIL SISWA</th>
                  <th class="text-center">KELAS</th>
                  <th class="text-center" colspan="10">PERTANYAAN</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-bold-500">Muhammad Farid</td>
                  <td>18106050045</td>
                  <td class="text-bold-500">mfarid@gmail.com</td>
                  <td>X E1</td>
                  @for ($i = 0; $i < 10; $i++)
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                      </div>
                    </td>
                  @endfor
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <a href="{{ route('questionnaire.create') }}" class="btn btn-secondary rounded-pill">Create</a>
    <a href="{{ route('questionnaire.edit') }}" class="btn btn-secondary rounded-pill">Edit</a>
  </section>
@endsection
