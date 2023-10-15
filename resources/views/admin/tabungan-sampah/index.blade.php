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
                                        <th>Name</th>
                                        <th>Saldo</th>
                                        <th>Total Berat</th>
                                        <th>Jml.Sampah</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td width="250px">
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->sampah->where('status', 'terima')->sum('harga') }}
                                            </td>
                                            <td>
                                                {{ $user->sampah->where('status', 'terima')->sum('berat') }}Kg.
                                            </td>
                                            <td>
                                                {{ $user->sampah->where('status', 'terima')->count() }}
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
