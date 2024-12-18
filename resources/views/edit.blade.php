@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-lg shadow-lg" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Create User</h2>
        <!-- Form Start -->
        <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Nama Field -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" value="{{ old('nama', $user->nama) }}">
                @foreach ($errors->get('nama') as $msg)
                    <p class="text-danger small">{{$msg}}</p>
                @endforeach
            </div>
            <!-- NPM Field -->
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" id="npm" name="npm" class="form-control" placeholder="Masukkan NPM" value="{{ old('npm', $user->npm) }}">
                @foreach ($errors->get('npm') as $msg)
                    <p class="text-danger small">{{$msg}}</p>
                @endforeach
            </div>
            <!-- Kelas Field -->
            <div class="mb-4">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-select">
                @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
                @endforeach
                </select>
                @foreach ($errors->get('kelas_id') as $msg)
                    <p class="text-danger small">{{$msg}}</p>
                @endforeach
            </div>
            <!-- Foto Field -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto">
                @if ($user->foto)
                <img src="{{asset($user->foto)}}" alt="User Photo" width="100" class="mt-2">
                @endif
            </div>
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <!-- Form End -->
    </div>
</div>
@endsection