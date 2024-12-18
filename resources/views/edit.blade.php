@extends('layouts.app')
@section('content')
<form action="{{ route('user.update', $user->id) }}" class="form-riil" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $user->nama) }}" >
        @error('nama')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" name="npm" class="form-control" id="npm" value="{{ old('npm', $user->npm) }}">
        @error('npm')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <select name="kelas_id" id="kelas_id" style="width: 100%; padding: 10px; margin-bottom: 15px;">
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        @error('kelas_id')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="file" id="foto" name="foto" style="margin-bottom: 15px;"><br>
        <label for="foto" style="color: #121212;">Foto :</label><br>
        @if($user->foto)
        <img src="{{ asset('upload/img/' . $user->foto) }}" alt="pp" style="width: 100px; height: auto;">
        @endif
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <a href="/user" class="btn-balik" style="font-size: 14px;background-color: #dc3545; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; margin-right: 10px;">Batal</a>
        <button type="submit" class="btn-save" style="background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Simpan</button>
    </div>
</form>
@endsection