@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Melihat Sampah Yang Masuk</h4>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nasabah</th>
                                        <th>Jenis Sampah</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Transaksi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($sampah as $data)
                                        <tr>
                                            <td> <b>{{ $data->user->name }}</b> <br> {{ $data->user->alamat }} <br>
                                                {{ $data->user->no_telepon }}</td>
                                            <td>{{ $data->jenis_sampah }}</td>
                                            <td>{{ $data->deskripsi }}</td>

                                            <td>
                                                <a target="_blank"
                                                    href="/storage/gambar/{{ $data->gambar }}">{{ $data->gambar }}</a>
                                            </td>
                                            <td>
                                                @if ($data->nama)
                                                    {{ $data->nama }} <br> {{ $data->berat }} Kg.
                                                    <br>Rp.{{ number_format($data->harga) }}
                                                @endif

                                            </td>
                                            <td>
                                                @if ($data->status == 'proses')
                                                    <span class="badge bg-warning">{{ $data->status }}</span>
                                                @endif
                                                @if ($data->status == 'selesai')
                                                    <span class="badge bg-success">{{ $data->status }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="/admin/sampah/{{ $data->id }}/terima"
                                                    onclick="return confirm('Apakah anda yakin ?')"
                                                    class="btn btn-success btn-sm">
                                                    Terima
                                                </a>
                                                <a href="/admin/sampah/{{ $data->id }}/tolak"
                                                    onclick="return confirm('Apakah anda yakin ?')"
                                                    class="btn btn-danger btn-sm">
                                                    Tolak
                                                </a>


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
