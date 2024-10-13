<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edward's Dashboard</title>
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
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white p-3 text-center">
        <h1>Edward's Dashboard</h1>
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
                    <h1 class="h2">Skibidi Supermarket</h1>
                    <p>Edward Samuel Susanto</p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">The Best Supermarket Experience</h5>
                                <p class="card-text">
                                    Welcome to Skibidi Supermarket, where we redefine your shopping experience. 
                                    Founded with a passion for quality and customer satisfaction, Skibidi Supermarket has grown into a household name. 
                                    We offer a wide range of products, from fresh groceries to household essentials, all at unbeatable prices. 
                                    Our friendly staff and clean, well-organized aisles make shopping a breeze. Come visit us and discover why Skibidi Supermarket is the best choice for all your needs!
                                </p>
                                <a href="https://skibidi.io/" class="btn btn-primary">Learn More</a>
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
</body>
</html>
