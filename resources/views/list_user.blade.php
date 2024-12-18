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
                        <img src="{{ asset($user->foto) }}" alt="foto profile" class="w-40 h-42 mb-4 rounded-full">
                    </td>
                    <td class="border border-black px-3 py-2 text-left">
                        <div class="flex">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning mb-3">Detail</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="bg-yellow-400 p-1 text-md-center font-semibold mx-1 rounded-lg">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 p-1 text-md-center font-semibold mx-1 rounded-lg" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
