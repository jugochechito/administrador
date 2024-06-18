<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        /* Estilos para el fondo del cuerpo */
        body {
            background: linear-gradient(to bottom right, #7721bd, #e0764c);
            padding-top: 0px; /* Para ajustar el contenido debajo de la barra de navegación */
        }

        /* Estilos para el carrusel */
        .carousel-item img {
            height: 100vh;
            height: 100vh; /* Ajustar altura de las imágenes del carrusel */
        }

        /* Estilos para las secciones */
        .section {
            background: linear-gradient(to bottom right, #ffffff, #9cb8c4);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .section-title {
            color: #2c3e50;
            margin-bottom: 30px;
        }

        /* Estilos para las tarjetas */
        .card {
            padding: 20px;
            width: 330px;
            min-height: 370px;
            border-radius: 20px;
            background: #e8e8e8;
            box-shadow: 5px 5px 6px #dadada, -5px -5px 6px #f6f6f6;
            transition: transform 0.4s;
            margin-bottom: 20px; /* Espacio inferior entre las tarjetas */
            overflow: hidden; /* Ocultar el contenido que excede el tamaño de la tarjeta */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #2e54a7;
            margin: 15px 0 0 10px;
        }

        .card-image {
            min-height: 170px;
            background-color: #c9c9c9;
            border-radius: 15px;
            box-shadow: inset 8px 8px 10px #c3c3c3, inset -8px -8px 10px #cfcfcf;
            overflow: hidden; /* Ocultar el contenido que excede el tamaño de la imagen */
        }

        .card-image img {
            width: 100%; /* Ajustar la imagen al 100% del contenedor */
            height: auto; /* Mantener la proporción de la imagen */
            display: block; /* Asegurar que la imagen se muestre correctamente */
        }

        .card-body {
            margin: 13px 0 0 10px;
            color: #1f1f1f;
            font-size: 15px;
            overflow: hidden; /* Ocultar el contenido que excede el tamaño de la tarjeta */
        }

        .footer {
            float: right;
            margin: 28px 0 0 18px;
            font-size: 13px;
            color: #636363;
        }

        .by-name {
            font-weight: 700;
        }

        /* Estilos para el botón de "Ver más" */
        .btn-primary {
            background-color: #2e54a7;
            border-color: #2e54a7;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #1c3d74;
            border-color: #1c3d74;
        }

        /* Estilos para la barra de navegación */
        .navbar {
            background-color: #f8f9fa; /* Color gris claro para la barra de navegación */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #2c3e50;
        }

        .nav-link {
            color: #2c3e50;
        }

        .nav-link:hover {
            color: #3ca89a; /* Cambiar color al pasar el mouse */
        }

        /* Estilos para los enlaces de los documentos */
        .list-group-item a {
            color: #2c3e50;
            text-decoration: none;
        }

        .list-group-item a:hover {
            color: #3ca89a; /* Cambiar color al pasar el mouse */
        }
    </style>
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
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Panel de Control</a>
                    </li>
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

    <!-- Contenido de la página -->
    <div class="container mt-5">
        <section class="section">
            <h2 class="section-title text-center mb-4">Noticias</h2>
            <div class="row">
                <!-- Aquí se generarán dinámicamente las tarjetas de noticias -->
                @foreach ($news as $newsItem)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $newsItem->image_path) }}" class="card-img-top" alt="Card Image">
                            </div>
                            <div class="card-body">
                                <p class="card-title">{{ $newsItem->title }}</p>
                                <p class="card-text">{{ $newsItem->subtitle }}</p>
                            </div>
                            <div class="footer">
                                <p>Escrito por <span class="by-name">{{ $newsItem->author }}</span> el <span class="date">{{ $newsItem->created_at->format('d/m/Y') }}</span></p>
                                <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="section">
            <h2 class="section-title text-center mb-4">Documentos</h2>
            <div class="row">
                <!-- Aquí se generarán dinámicamente las tarjetas de documentos -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PDFs</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($pdfs as $pdf)
                                    <li class="list-group-item"><a href="{{ asset ('storage/' . $pdf->file_path) }}" target="_blank">{{ $pdf->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Documentos de Word</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($words as $word)
                                    <li class="list-group-item"><a href="{{ asset('storage/' . $word->file_path) }}" target="_blank">{{ $word->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Documentos de Excel</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($excels as $excel)
                                    <li class="list-group-item"><a href="{{ asset('storage/' . $excel->file_path) }}" target="_blank">{{ $excel->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

