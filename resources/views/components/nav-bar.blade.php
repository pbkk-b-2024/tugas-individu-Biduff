<div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ url('/') }}">Dashboard</a>
            <a href="{{ url('/pertemuan1') }}">Pertemuan 1</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- First Square: Routing Links -->
            <div class="section">
                <h2>Routing Links</h2>
                <a href="{{ url('/pertemuan1/routing/basic') }}">Basic Routing</a>
                <a href="{{ url('/pertemuan1/routing/parameters') }}">Parameters Routing</a>
                <a href="{{ url('/pertemuan1/routing/named') }}">Named Routeing</a>
                <a href="{{ url('/pertemuan1/routing/groups') }}">Groups Routing</a>
                <a href="{{ url('/pertemuan1/123456789') }}">Fallback Routing</a>
            </div>
            
            <!-- Second Square: Number Operations Links -->
            <div class="section">
                <h2>Number Operations</h2>
                <a href="{{ route('genap-ganjil') }}">GenapGanjil</a>
                <a href="{{ route('fibonacci') }}">Fibonacci</a>
                <a href="{{ route('bilangan-prima') }}">Prima</a>
            </div>

            <!-- Yield content if needed -->
            @yield('content')
        </div>
    </div>