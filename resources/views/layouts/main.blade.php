<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .footer {
            border-top: 1px solid #ddd;
            background-color: #f8f9fa;
        }

        .card-body {
            background-color: #f0f8ff;
        }

        .carousel-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #fff; /* White background for contrast */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .carousel-item img {
            max-height: 300px; /* Set max height to make it smaller */
            width: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white p-3 text-center">
        <h1>Supermarket Dashboard</h1>
        @guest
            <a href="{{ route('login') }}" class="btn btn-light">Login</a>
            <a href="{{ route('register') }}" class="btn btn-light">Register</a>
        @else
            <span>Welcome, {{ Auth::user()->name }}</span>
        @endguest
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers.index') }}">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stocks.index') }}">Stocks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shippings.index') }}">Shippings</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Selamat Berbelanja</h1>
                    <div class="dropdown">
                        <p id="userName" style="cursor: pointer;">{{ Auth::user()->name }}</p>
                        <div id="logoutDropdown" style="display: none;">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center mb-3">
                            <h5 class="text">Jangan melewatkan promo-promo terbaru!!!</h5>
                        </div>
                        <div class="carousel-container"> <!-- Carousel in a visible box -->
                            <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://t4.ftcdn.net/jpg/04/48/85/83/360_F_448858321_QghNb9B2Ory6z1Zy4QqVaxgrBnF7vul1.jpg" class="d-block w-100" alt="Promo 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://t3.ftcdn.net/jpg/00/48/29/92/360_F_48299241_I5A7IhGjjSuHYZXuTWhsjvNF2rhIhCMp.jpg" class="d-block w-100" alt="Promo 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://st.depositphotos.com/1186248/4216/i/450/depositphotos_42167223-stock-photo-promo.jpg" class="d-block w-100" alt="Promo 3">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </main>
        </div>
    </div>
        <!-- Footer -->
    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">&copy; 2024 Edward's Dashboard. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('userName').addEventListener('click', function() {
            var logoutDropdown = document.getElementById('logoutDropdown');
            if (logoutDropdown.style.display === 'none') {
                logoutDropdown.style.display = 'block';
            } else {
                logoutDropdown.style.display = 'none';
            }
        });
    </script>

</body>
</html>
