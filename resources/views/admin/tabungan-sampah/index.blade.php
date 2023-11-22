@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tabungan Sampah</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Saldo</th>
                                        <th>Total Berat</th>
                                        <th>Jml.Sampah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td width="250px">
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ number_format($user->saldo) }}
                                            </td>
                                            <td>
                                                {{ $user->sampah->where('status', 'terima')->sum('berat') }}Kg.
                                            </td>
                                            <td>
                                                {{ $user->sampah->where('status', 'terima')->count() }}
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $user->id }}">
                                                    Ambil Saldo
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="/admin/tabungan-sampah/{{ $user->id }}/ambil ">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        {{ $user->name }}</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for=""
                                                                            class="form-label">Saldo</label>
                                                                        <input type="text" class="form-control" readonly
                                                                            name="saldo"
                                                                            value=" {{ number_format($user->saldo) }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Jumlah
                                                                            Saldo Yang Diambil</label>
                                                                        <input type="number" min="100000"
                                                                            placeholder="minimal 100.000"
                                                                            class="form-control" name="jumlah_saldo"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Ambil
                                                                        Saldo</button>
                                                                </div>
                                                            </div>
                                                        </form>
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
