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
        {{--    navbar panel--}}
        @component('components.navbar')
        @endcomponent

        {{--    sidebar panel--}}
        <div class="container-fluid page-body-wrapper">
            @component('components.sidebar')
            @endcomponent
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <h1>Admin DASHBOARD</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
