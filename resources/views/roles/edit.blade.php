<!-- resources/views/roles/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Role</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection