@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header bg-custom-gradient-2">
            {{ $judul }}
        </div>
        <div class="card-body">
            <a href="/pasien/create" class="btn bg-custom-gradient-2 mb-2">Tambah Pasien</a>
            <div class="row mb-2">
                <div class="col">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari data pasien"
                                value="{{ request('q') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn bg-custom-gradient-2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama Pemilik</th>
                        <th>No HP</th>
                        <th>Nama Hewan</th>
                        <th>Tanggal Buat</th>
                        <th width="19%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->kode_pasien }}</td>
                            <td>{{ $item->nama_pasien }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>{{ $item->nama_hewan }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('pasien.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/pasien/{{ $item->id }}/edit" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
