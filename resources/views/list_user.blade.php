@extends('layouts.app')

@section('content')
<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
<h1 style="font-size: 2rem; margin-bottom: 20px;">Daftar User</h1>

<div class="table-container">
    <table style="width: 100%; border-collapse: collapse;" class="min-w-full table-auto border-collapse border border-black"> 
        <thead>
            <tr class="bg-gray-300">
                <th class="border border-black px-3 py-2 text-center">ID</th>
                <th class="border border-black px-3 py-2 text-center">Nama</th>
                <th class="border border-black px-3 py-2 text-center">NPM</th>
                <th class="border border-black px-3 py-2 text-center">Kelas</th>
                <th class="border border-black px-3 py-2 text-center">Foto</th>
                <th class="border border-black px-3 py-2 text-center">Aksi</th>
            </tr> 
        </thead> 
        <tbody> 
            @foreach ($users as $user)
                <tr class="hover:bg-gray-100 bg-white">
                    <td class="border border-black px-3 py-2 text-left">{{ $user['id'] }}</td>
                    <td class="border border-black px-3 py-2 text-left">{{ $user['nama'] }}</td>
                    <td class="border border-black px-3 py-2 text-left">{{ $user['npm'] }}</td>
                    <td class="border border-black px-3 py-2 text-left">{{ $user['nama_kelas'] }}</td>
                    <td class="border border-black px-3 py-2 text-left">
                        <img src="{{ asset('upload/img/' . $user->foto) }}" alt="Foto User" width="100">
                    </td>
                    <td class="border border-black px-3 py-2 text-left">
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
