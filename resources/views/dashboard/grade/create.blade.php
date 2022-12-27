@extends('layouts.dashboard.master_dashboard')

@section('main')
  @include('partial.notification')

  <h4 class="text-center mt-3">Halaman Kuesioner Penilaian</h4>
  @livewire('penilaian-form')
@endsection