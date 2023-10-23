@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Sampah</h4>

        <div class="row">
            <div class="col-md-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Sampah
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="/nasabah/sampah" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sampah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Jenis Sampah</label>
                                        <select name="jenis_sampah" id="jenis_sampah" class="form-control">
                                            <option value="Botol">Botol Plastik</option>
                                            <option value="Gelas">Gelas Minuman</option>
                                            <option value="Kardus">Kardus</option>
                                            <option value="Kaleng/Besi">Kaleng/Besi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                        <th>Jenis Sampah</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($sampah as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>{{ $data->jenis_sampah }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td><a target="_blank"
                                                    href="/storage/gambar/{{ $data->gambar }}">{{ $data->gambar }}</a></td>
                                            <td>
                                                @if ($data->status == 'proses')
                                                    <span class="badge bg-warning">{{ $data->status }}</span>
                                                @endif
                                                @if ($data->status == 'selesai')
                                                    <span class="badge bg-success">{{ $data->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a data-confirm-delete="true" href="/nasabah/sampah/{{ $data->id }}"
                                                    class="btn btn-danger btn-sm">Batalkan</a>
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
