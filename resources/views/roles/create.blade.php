<!-- resources/views/roles/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Role Baru</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Role</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection