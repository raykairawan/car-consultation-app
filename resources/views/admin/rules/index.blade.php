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
                                    <h4 class="card-title">Manajemen Master Data Rules</h4>
                                    <p class="card-description">Berikut adalah list master data<code>rules</code></p>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Rule Name</th>
                                                <th>Factor</th>
                                                <th>Solution</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Percentage</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($rules as $rule)
                                                <tr data-id="{{ $rule->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>[{{ $rule->name->code }}] - {{ $rule->name->name }}</td>
                                                    <td>[{{ $rule->factor->code }}] - {{ $rule->factor->factor }}</td>
                                                    <td>{{ $rule->solution }}</td>
                                                    <td>
                                                        @foreach($rule->ruleQuestionsAnswers as $rqa)
                                                            {{ $rqa->question->name }}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($rule->ruleQuestionsAnswers as $rqa)
                                                            {{ $rqa->answer->answer_code }}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $rule->percentage }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.rules.destroy', $rule->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    class="btn btn-danger btn-sm delete-button">
                                                                <i class="fa-solid fa-trash-arrow-up"></i>
                                                            </button>                                                        </form>
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
