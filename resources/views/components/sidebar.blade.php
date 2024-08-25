<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#consultations" aria-expanded="false" aria-controls="consultations">
                <i class="menu-icon mdi mdi-chat-processing"></i>
                <span class="menu-title">Consultation</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="consultations">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.consultations.index') }}">Data Konsultasi</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rules" aria-expanded="false" aria-controls="rules">
                <i class="menu-icon mdi mdi-cog-sync"></i>
                <span class="menu-title">Rules</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rules">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.rules.create') }}">Tambah Aturan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.rules.index') }}">Data Aturan</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Optional</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#question" aria-expanded="false" aria-controls="question">
                <i class="menu-icon mdi mdi-message-question"></i>
                <span class="menu-title">Question</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="question">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.questions.create') }}">Tambah Pertanyaan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.questions.index') }}">Data Pertanyaan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#answer" aria-expanded="false" aria-controls="answer">
                <i class="menu-icon mdi mdi-adjust"></i>
                <span class="menu-title">Answer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="answer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.answers.index') }}">Data Jawaban</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#name" aria-expanded="false" aria-controls="name">
                <i class="menu-icon mdi mdi-car-info"></i>
                <span class="menu-title">Name</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="name">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.names.create') }}">Tambah Gejala</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.names.index') }}">Data Gejala</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#factor" aria-expanded="false" aria-controls="factor">
                <i class="menu-icon mdi mdi-car-cog"></i>
                <span class="menu-title">Factor</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="factor">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.factors.create') }}">Tambah Faktor</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.factors.index') }}">Data Faktor</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Users</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                <i class="menu-icon mdi mdi-account-cog"></i>
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="">My Profile</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="logout-link">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

<script>
    document.getElementById('logout-link').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>
