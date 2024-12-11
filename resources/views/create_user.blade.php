@extends('layouts.app')
@section('content')
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="" placeholder="Masukkan nama Anda" >
        @error('nama')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" name="npm" class="form-control" id="npm" aria-describedby="" placeholder="Masukkan NPM Anda">
        @error('npm')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <select name="kelas_id" id="kelas_id" style="width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box;">
            <option value="" disabled selected>Pilih kelas Anda</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        @error('kelas_id')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif;">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah User</button>
</form>
@endsection