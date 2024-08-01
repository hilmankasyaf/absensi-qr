<!-- resources/views/roles/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Role</h1>
    <div class="card">
        <div class="card-header">
            Role #{{ $role->id }}
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $role->name }}</p>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection