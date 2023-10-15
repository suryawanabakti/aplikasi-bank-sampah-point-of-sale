@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Data Penjualan Sampah Masuk</h4>
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
                                                @if ($data->berat)
                                                    {{ $data->berat }} Kg.
                                                    <br>Rp.{{ number_format($data->harga) }}
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">
                                                    Ambil
                                                </button>
                                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/admin/sampah/{{ $data->id }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5 fw-bold"
                                                                        id="exampleModalLabel">
                                                                        Ambil
                                                                        Sampah {{ $data->user->name }}</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Berat
                                                                            (Kg)
                                                                        </label>
                                                                        <input type="number" class="form-control"
                                                                            name="berat">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Harga
                                                                            (Rp.)
                                                                        </label>
                                                                        <input type="number" class="form-control"
                                                                            name="harga">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
