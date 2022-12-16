@extends('layouts.dashboard.master_dashboard')

@section('main')
    <h1>Ini Halaman Index Grade</h1>
    <a href="{{ route('grade.create') }}" class="btn btn-secondary rounded-pill">Create</a>
    <a href="{{ route('grade.edit') }}" class="btn btn-secondary rounded-pill">Edit</a>
@endsection
