@extends('layouts.dashboard.master_dashboard')

@section('main')
    <h1>Ini Halaman Index Group</h1>
    <a href="{{ route('group.create') }}" class="btn btn-secondary rounded-pill">Create</a>
    <a href="{{ route('group.edit') }}" class="btn btn-secondary rounded-pill">Edit</a>
@endsection
