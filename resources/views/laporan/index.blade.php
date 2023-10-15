@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Sampah</h4>

        <div class="row">
            <div class="col-md-12">
                <a href="/laporan/sampah/cetak" target="_blank" class="btn btn-warning mb-3">Cetak</a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nasabah</th>
                                        <th>Jenis Sampah</th>
                                        <th>Deskripsi</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($sampah as $data)
                                        <tr>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td> <b>{{ $data->user->name }}</b>
                                            </td>
                                            <td>{{ $data->jenis_sampah }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>
                                                {{ $data->berat }}
                                            </td>
                                            <td>{{ number_format($data->harga) }}</td>

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