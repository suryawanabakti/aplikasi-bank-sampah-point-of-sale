@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Tabungan Sampah</h4>

        <div class="row">
            <div class="col-md-12">
                <b>Total Saldo : {{ number_format(auth()->user()->saldo) }}</b>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Deskripsi</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($sampah as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>{{ $data->jenis_sampah }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>{{ $data->berat }}</td>
                                            <td>
                                                {{ $data->harga }}
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
