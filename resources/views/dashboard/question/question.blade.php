@extends('layouts.dashboard.master_dashboard')

@section('main')
    <h1>Ini Halaman Index Question</h1>
    <a href="{{ route('question.create') }}" class="btn btn-secondary rounded-pill">Create</a>
    <a href="{{ route('question.edit') }}" class="btn btn-secondary rounded-pill">Edit</a>
@endsection
