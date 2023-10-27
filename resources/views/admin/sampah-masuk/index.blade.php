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
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nasabah</th>
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
                                            <td> <b>{{ $data->user->name }}</b> <br> {{ $data->user->alamat }} <br>
                                                {{ $data->user->no_telepon }}</td>
                                            <td>{{ $data->jenis_sampah }}</td>
                                            <td>{{ $data->deskripsi }}</td>

                                            <td>
                                                <a target="_blank"
                                                    href="/storage/gambar/{{ $data->gambar }}">{{ $data->gambar }}</a>
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
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">
                                                    Tolak
                                                </button>




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
    <!-- Modal -->
    @foreach ($sampah as $data)
        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sampah {{ $data->user->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/sampah/{{ $data->id }}/tolak">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Alasan</label>
                                <textarea required name="alasan" id="alasan" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Tolak & Kirim Alasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        $('#myTable').DataTable()
    </script>
@endpush
