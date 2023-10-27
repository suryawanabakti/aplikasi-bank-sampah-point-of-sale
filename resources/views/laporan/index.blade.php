@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Sampah</h4>

        <form action="">
            <div class="row mb-2">
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="term" value="{{ request('term') }}"
                            placeholder="Cari Lalu Tekan Enter">
                    </div>

                </div>
                <div class="col-md-4">
                    <a href="/laporan/sampah/cetak/term/{{ request('term') ?? 0 }}" target="_blank"
                        class="btn btn-warning">Cetak</a>
                </div>
        </form>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nasabah</th>
                                    <th>Jenis Sampah</th>
                                    <th>Deskripsi</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($sampah as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->created_at->format('d M Y') }}</td>
                                        <td> <b>{{ $data->user->name }}</b>
                                        </td>
                                        <td>{{ $data->jenis_sampah }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td>
                                            {{ $data->berat }}
                                        </td>
                                        <td>{{ number_format($data->harga) }}</td>
                                        <td>
                                            <a href="/laporan/sampah/cetak/{{ $data->id }}" target="_blank"
                                                class="btn btn-warning">cetak</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>

            </div>
        </div>
    </div>

    </div>
@endsection

@push('js')
    <script>
        $('#myTable').DataTable()
    </script>
@endpush
