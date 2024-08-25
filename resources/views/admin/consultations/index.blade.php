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
                                    <h4 class="card-title">Manajemen Master Data Consultation</h4>
                                    <p class="card-description">Berikut adalah list master data<code>consultation</code></p>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama User</th>
                                                <th>Telepon</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Tanggal Konsultasi</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($consultations as $consultation)
                                                <tr data-id="{{ $consultation->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td  >{{ $consultation->user_name }}</td>
                                                    <td  >{{ $consultation->user_tlp }}</td>
                                                    <td  >{{ $consultation->user_gender }}</td>
                                                    <td  >{{ $consultation->user_address }}</td>
                                                    <td  >{{ $consultation->user_date }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.consultations.destroy', $consultation->id) }}" method="POST" class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm delete-button">
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

                // Edit Button Script
                const editableCells = document.querySelectorAll('.editable');

                editableCells.forEach(cell => {
                    cell.addEventListener('focus', (e) => {
                        e.target.dataset.originalValue = e.target.innerText;
                    });

                    cell.addEventListener('blur', (e) => {
                        const originalValue = e.target.dataset.originalValue;
                        const newValue = e.target.innerText.trim();
                        const rowId = e.target.closest('tr').dataset.id;
                        const column = e.target.cellIndex;
                        const columnName = e.target.closest('table').querySelectorAll('th')[column].innerText.replace(/\s+/g, '_').toLowerCase();

                        if (newValue === originalValue) return;

                        if (newValue === '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Data tidak boleh kosong',
                            }).then(() => {
                                e.target.innerText = originalValue;
                            });
                            return;
                        }

                        Swal.fire({
                            title: 'Apakah Anda ingin mengubah data ini?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, ubah',
                            cancelButtonText: 'Batal',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                updateMachineData(rowId, columnName, newValue);
                            } else {
                                e.target.innerText = originalValue;
                            }
                        });
                    });
                });

                function updateMachineData(id, field, value) {
                    const form = new FormData();
                    form.append('_method', 'PUT');
                    form.append('_token', '{{ csrf_token() }}');
                    form.append(field, value);

                    fetch(`/admin/consultations/${id}`, {
                        method: 'POST',
                        body: form,
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log('Success:', data);
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil diperbarui',
                            });
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat memperbarui data',
                            });
                        });
                }
            });
        </script>
@endsection
