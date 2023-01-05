@extends('layouts.dashboard.master_dashboard')

@section('main')
  @include('partial.notification')

  <h4 class="text-center mt-3">Halaman Penilaian Guru</h4>
  @livewire('grade-teacher')
@endsection
