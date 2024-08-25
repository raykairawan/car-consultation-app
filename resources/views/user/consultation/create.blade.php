@extends('layouts.app')

@section('content')
    <div class="container" x-data="{ step: 1, totalSteps: {{ count($questions) + 1 }}, filled: {} }">
        <h2>Start Your Consultation</h2>

        <form action="{{ route('user.consultation.store') }}" method="POST">
            @csrf

            <!-- Step 1: Data User -->
            <div x-show="step === 1">
                <div class="form-group">
                    <label for="user_name">Nama</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="user_tlp">Phone Number</label>
                    <div class="input-group">
                        <select name="phone_code" class="form-control text-black" style="max-width: 200px;" required>
                            <option value="+62">+62 (Indonesia)</option>
                            <option value="+1">+1 (USA)</option>
                            <option value="+44">+44 (UK)</option>
                        </select>
                        <input type="text" name="user_tlp" class="form-control" placeholder="81222333444" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_gender">Jenis Kelamin</label>
                    <select name="user_gender" class="form-control text-black" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Male">Laki-laki</option>
                        <option value="Female">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_address">Alamat</label>
                    <input type="text" name="user_address" class="form-control" placeholder="Alamat Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="user_date">Date</label>
                    <input type="date" name="user_date" class="form-control" id="user_date" required>
                </div>

                <button type="button" class="btn btn-primary" @click="if (checkStep(step)) step++">Next</button>
            </div>

            <!-- Step 2 and beyond: Pertanyaan -->
            @foreach($questions as $index => $question)
                <div x-show="step === {{ $index + 2 }}">
                    <div class="form-group">
                        <label>{{ $question->name }}</label>
                        <select name="answers[{{ $question->id }}]" class="form-control text-black" required @change="filled[{{ $question->id }}] = $event.target.value">
                            <option value="">Select an option</option>
                            <option value="0">Tidak</option>
                            <option value="0.2">Tidak Yakin</option>
                            <option value="0.4">Sedikit Yakin</option>
                            <option value="0.6">Cukup Yakin</option>
                            <option value="0.8">Yakin</option>
                            <option value="1">Sangat Yakin</option>
                        </select>
                    </div>

                    <!-- Display icon based on whether the answer is filled or not -->
                    <div class="form-group">
                <span x-show="filled[{{ $question->id }}] !== undefined">
                    <span x-text="filled[{{ $question->id }}] !== '' ? '✔️' : '❌'" class="text-success"></span>
                </span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" @click="step--">Back</button>
                        <button type="button" class="btn btn-primary" @click="if (checkStep(step)) step++" x-show="step < totalSteps">Next</button>
                        <button type="submit" class="btn btn-success" x-show="step === totalSteps" @click="validateForm()">Submit Consultation</button>
                    </div>
                </div>
            @endforeach
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the date input to today's date by default
            let today = new Date().toISOString().split('T')[0];
            document.getElementById('user_date').value = today;
        });

        function checkStep(step) {
            let valid = true;
            document.querySelectorAll('[x-show="step === ' + step + '"] [required]').forEach(function (input) {
                if (!input.value) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            return valid;
        }

        function validateForm() {
            let valid = true;
            document.querySelectorAll('[required]').forEach(function (input) {
                if (!input.value) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (!valid) {
                alert('Harap isi semua pertanyaan sebelum mengirim.');
            }
            return valid;
        }
    </script>
@endsection
