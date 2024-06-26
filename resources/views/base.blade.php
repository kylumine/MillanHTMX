<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>

    <!-- Include Tailwind CSS from a local installation -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybReRbPhESEn0fnxU5VZBbFoHYBfF5hS1gEFp8K4iSiB6aEbx" crossorigin="anonymous"></script>

    <!-- HTMX -->
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@latest"></script>

    <!-- Custom Styles -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .main-container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto; /* Enable scrolling if content exceeds sidebar height */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #444;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            width: 100%;
            font-size: 16px;
            padding: 10px;
            text-align: left;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar ul li a:hover, .sidebar ul li a.active {
            background-color: #575757;
        }

        .content-container {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px; /* Adjusted to match sidebar width */
            background-color: #f4f4f4;
            overflow-y: auto; /* Enable scrolling if content exceeds viewport */
        }
    </style>
</head>
<body>
    <div class="main-container">
        <nav class="sidebar">
            <ul>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}">Products</a></li>
                <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
        </nav>
        <div class="content-container">
            @yield('content')
        </div>
    </div>
    @yield('scripts')
</body>
</html>
