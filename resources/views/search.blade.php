@extends('layouts.app')

@section('content')

<x-header />

    <section class="buscador-section">

        <div class="buscador-container">
            <strong><a href="/">X</a></strong>
            <h2>¿Qué te apetece hoy?</h2>
            <p>¡Busca entre nuestros platos preparados!</p>

            <!-- Filtros -->
            <form action="{{ route('productos.buscar') }}" method="GET" class="filtros-form">

                <!-- Barra de búsqueda -->
                <div class="search-bar">
                    <input type="text" name="search" placeholder="🔍 Busca por nombre o filtra tu búsqueda...">
                </div>

                <div class="filtros-columnas">

                    <!-- FILTROS POR ALERGIAS -->
                    <div class="filtro-bloque">
                        <h3>Filtra según tus alergias</h3>
                        <div class="filtro-grid">
                            @foreach ($alergenos as $alergeno)
                                <label class="checkbox-item">
                                    <input type="checkbox" name="alergenos[]" value="{{ $alergeno->id }}">
                                    <span>{{ strtoupper($alergeno->type) }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- FILTROS POR TIPO DE COMIDA -->
                    <div class="filtro-bloque">
                        <h3>Filtra por tipo de comida</h3>
                        <div class="filtro-grid">
                            @foreach ($categorias as $categoria)
                                <!-- Itera todas las categorías de la tabla categories -->
                                <label class="checkbox-item">
                                    <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}">
                                    <!-- Guarda el id de la categoría -->
                                    <span>{{ strtoupper($categoria->type) }}</span>
                                    <!-- Muestra el nombre de la categoría en mayúsculas -->
                                </label>
                            @endforeach
                        </div>
                    </div>


                </div>

                <!-- Botón buscar -->
                <div class="boton-buscar">
                    <img src="img/Group 348.png" alt="Verduras del logo">
                    <button type="submit">
                        <i class="fas fa-search"></i> REALIZAR BÚSQUEDA
                    </button>
                </div>
            </form>
        </div>

    </section>

    {{-- SECCIÓN PRODUCTOS FILTRADOS --}}
    @if (request()->has('search') || request()->has('alergenos') || request()->has('categorias'))
        <section id="productos" class="productos-section">
            <div class="titulo-link">
                <h2>🍪 Resultados de tu búsqueda</h2>
            </div>

            @if ($productos->count() > 0)
                <div class="productos-grid">
                    @foreach ($productos as $product)
                        <div class="producto-card">
                            <a href="{{ route('productos.show', $product->id) }}">
                                <img src="{{ asset('img/products/' . $product->photo) }}" alt="{{ $product->name }}">
                                <h3>{{ strtoupper($product->name) }}</h3>
                                <p>{{ number_format($product->price, 2) }} €</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-resultados">No se encontraron productos con los filtros seleccionados 😔</p>
            @endif
        </section>
    @endif

    <x-footer/>
@endsection

@push('styles')
    <style>
        body {
            background-color: #f8f6ed;
        }

        a {
            text-decoration: none;
        }

        .buscador-section {
            background-color: #f8f6ed;
            min-height: auto;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 60px 20px;
            font-family: 'Inter', sans-serif;
            color: #004d43;
        }

        .buscador-container {
            background: #fefdf8;
            border: 2px solid #dcd8c8;
            border-radius: 12px;
            padding: 40px 50px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .buscador-container h2 {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .buscador-container p {
            text-align: center;
            margin-bottom: 25px;
            color: #5e5e5e;
        }

        .search-bar input {
            width: 100%;
            padding: 14px 20px;
            border: 1.5px solid #c9c6bb;
            border-radius: 25px;
            font-size: 1rem;
            background-color: #f2f1ea;
            margin-bottom: 35px;
            outline: none;
        }

        .filtros-columnas {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .filtro-bloque {
            flex: 1;
            min-width: 300px;
        }

        .filtro-bloque h3 {
            color: #004d43;
            margin-bottom: 15px;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .filtro-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 20px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            color: #333;
        }

        .checkbox-item input {
            width: 18px;
            height: 18px;
            accent-color: #004d43;
            cursor: pointer;
        }

        .checkbox-item span {
            cursor: pointer;
        }

        /* Botón */
        .boton-buscar {
            background-color: #004d43;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding: 15px;
            border-radius: 0 0 10px 10px;
        }


        .boton-buscar button {
            background: none;
            border: none;
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .boton-buscar button:hover {
            color: #efff00;
            transform: scale(1.03);
        }

        .productos-section {
            padding: 60px 40px;
        }

        .titulo-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .titulo-link h2 {
            font-size: 2.2rem;
            color: #004d43;
        }

        .titulo-link a {
            display: inline-block;
            border: 2px solid #000;
            color: #000;
            padding: 8px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .titulo-link a:hover {
            background: #efff00;
        }

        .productos-grid {

            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            /* tarjetas más pequeñas */
            gap: 15px;
            /* espacio más reducido entre tarjetas */
        }

        .producto-card {
            background: #fff;
            border-radius: 10px;
            text-align: center;
            width: 30%;
            /* menos padding que antes */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            /* sombra más ligera */
            transition: transform 0.2s ease;
        }

        .producto-card img {
            width: 100%;
            height: 100px;
            /* imagen más pequeña */
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 8px;
            /* menos margen */
        }

        .producto-card h3 {
            font-size: 1rem;
            /* texto más pequeño */
            margin-bottom: 4px;
        }

        .producto-card p {
            font-weight: bold;
            color: #d2e300;
            font-size: 0.9rem;
            /* precio más pequeño */
        }


        .no-resultados {
            text-align: center;
            color: #555;
            font-size: 1.1rem;
            margin-top: 30px;
        }

        .boton-buscar img {
            height: 50px;
            width: auto;
            margin-left: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .filtros-columnas {
                flex-direction: column;
            }

            .filtro-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
@endpush
