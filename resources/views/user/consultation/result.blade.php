@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Consultation Results</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Consultation Details</h5>
                <p><strong>Name:</strong> {{ $consultation->user_name }}</p>
                <p><strong>Phone Number:</strong> {{ $consultation->user_tlp }}</p>
                <p><strong>Gender:</strong> {{ $consultation->user_gender }}</p>
                <p><strong>Address:</strong> {{ $consultation->user_address }}</p>
                <p><strong>Date:</strong> {{ $consultation->user_date }}</p>
            </div>
        </div>

        <h3>Results:</h3>
        @if($results && $results->count() > 0)
            @foreach($results as $result)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Rule: {{ $result->rule->name }}</h5>
                        <p><strong>Factor:</strong> {{ $result->factor }}</p>
                        <p><strong>Solution:</strong> {{ $result->solution }}</p>
                        <p><strong>Percentage:</strong> {{ $result->percentage }}%</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No results found for this consultation.</p>
        @endif
    </div>
@endsection
