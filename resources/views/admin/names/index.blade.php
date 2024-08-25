@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        @if(Session::has('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ Session::get('success') }}',
                    });
                });
            </script>
        @endif

        {{-- navbar panel --}}
        @component('components.navbar')
        @endcomponent

        {{-- sidebar panel --}}
        <div class="container-fluid page-body-wrapper">
            @component('components.sidebar')
            @endcomponent

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manajemen Master Data Names</h4>
                                    <p class="card-description">Berikut adalah list master data<code>names</code></p>
                                    <div class="d-flex justify-content-between align-items-start mb-6">
                                        <div>
                                            <a href="{{ route('admin.names.create') }}" class="btn btn-outline-behance">Tambah
                                                Gejala</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Gejala</th>
                                                <th>Nama Gejala</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($names as $name)
                                                <tr data-id="{{ $name->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $name->code }}</td>
                                                    <td>{{ $name->name }}</td>
                                                    <td>{{ $name->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.names.edit', $name->id) }}"
                                                           class="btn btn-inverse-dark btn-sm">
                                                            <i class="fa-solid fa-user-edit"></i>
                                                        </a>
                                                        <form action="{{ route('admin.names.destroy', $name->id) }}"
                                                              method="POST" class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    class="btn btn-danger btn-sm delete-button">
                                                                <i class="fa-solid fa-trash-arrow-up"></i>
                                                            </button>
                                                        </form>
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
            </div>
        </div>

        {{-- SweetAlert2 and Custom Scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Delete Button Script
                document.querySelectorAll('.delete-button').forEach(function (button) {
                    button.addEventListener('click', function () {
                        var form = this.closest('form');
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda tidak akan dapat mengembalikan ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
@endsection
