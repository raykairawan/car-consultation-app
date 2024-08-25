@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        @if(Session::has('error'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ Session::get('error') }}',
                    });
                });
            </script>
        @endif

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

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-8 mx-auto">
                            <div class="auth-form-light shadow-sm text-left py-3 px-5 px-sm-5">
                                <h4>Tambah Pertanyaan</h4>
                                <h6 class="fw-light"></h6>
                                <form action="{{ route('admin.rules.store') }}" method="POST" class="pt-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Rule Name</label>
                                        <select class="form-control" id="name" name="name" required>
                                            @foreach($names as $name)
                                                <option value="{{ $name->id }}">{{ $name->code }} - {{ $name->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="factor" class="form-label">Factor</label>
                                        <select class="form-control" id="factor" name="factor" required>
                                            @foreach($factors as $factor)
                                                <option value="{{ $factor->id }}">{{ $factor->code }} - {{ $factor->factor }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="solution" class="form-label">Solution</label>
                                        <input type="text" class="form-control" id="solution" name="solution" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="percentage" class="form-label">Percentage</label>
                                        <input type="number" class="form-control" id="percentage" name="percentage" step="0.01">
                                    </div>

                                    <h3>Questions</h3>
                                    @foreach($questions as $question)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question_id" id="question_{{ $question->id }}" value="{{ $question->id }}" required>
                                            <label class="form-check-label" for="question_{{ $question->id }}">
                                                {{ $question->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <h3>Answers</h3>
                                    @foreach($answers as $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer_id" id="answer_{{ $answer->id }}" value="{{ $answer->id }}" required>
                                            <label class="form-check-label" for="answer_{{ $answer->id }}">
                                                {{ $answer->answer_name }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
