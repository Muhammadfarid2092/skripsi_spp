@extends('layouts.dashboard.master_dashboard')

@section('main')
    <h1>Ini Halaman Index User</h1>
    <a href="{{ route('user.create') }}" class="btn btn-secondary rounded-pill">Create</a>
    <a href="{{ route('user.edit') }}" class="btn btn-secondary rounded-pill">Edit</a>
@endsection
