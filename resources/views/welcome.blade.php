<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- Barra de Menú -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section1">Section 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section2">Section 2</a>
                    </li>
                    <!-- Agrega más secciones según sea necesario -->
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Panel de Control</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section1">Section 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section2">Section 2</a>
                    </li>
                    <!-- Agrega más secciones según sea necesario -->
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($carouselImages as $index => $image)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($carouselImages as $index => $image)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Secciones -->
    <div id="section1" style="height: 100vh; background-color: #f8f9fa;">
        <h2 class="text-center pt-5">Section 1</h2>
        <p class="text-center">Content for Section 1</p>
    </div>
    <div id="section2" style="height: 100vh; background-color: #e9ecef;">
        <h2 class="text-center pt-5">Section 2</h2>
        <p class="text-center">Content for Section 2</p>
    </div>

    <!-- Noticias -->
    <div class="container mt-5">
        <h2 class="text-center">Noticias</h2>
        <div class="row">
            @foreach ($news as $newsItem)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $newsItem->image_path) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $newsItem->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $newsItem->subtitle }}</h6>
                            <p class="card-text">{{ $newsItem->description }}</p>
                            <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
