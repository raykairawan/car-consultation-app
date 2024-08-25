@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome to the Consultation Page</h2>
        <a href="{{ route('user.consultation.create') }}" class="btn btn-primary">Start New Consultation</a>
    </div>
@endsection
