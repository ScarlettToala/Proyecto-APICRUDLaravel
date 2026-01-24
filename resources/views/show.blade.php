@extends('layouts.app')

@section('content')
    <!-- Header-->
    <x-header />
    

    <section class="detalle-producto">
        <div class="detalle-container">

            <!-- Galería 2x2 -->
            <div class="galeria-collage">
                @foreach ($allImages as $imagen)
                    <div class="imagen-celda">
                        <img src="{{ asset($imagen) }}" alt="Imagen producto">
                    </div>
                @endforeach
            </div>

            <!-- Información del producto -->
            <div class="detalle-info">
                <h1>{{ strtoupper($product->name) }}</h1>

                <!--Alergenos-->

                <h3>ALÉRGENOS</h3>
                <ul class="alergenos-list">
                    @foreach ($product->allergens as $alergeno)
                        <li>
                            @if ($alergeno->photo)
                                <img src="{{ asset('img/allergens/' . $alergeno->photo) }}" alt="{{ $alergeno->type }}"
                                    width="40">
                            @endif
                            <span>
                                <p>Contiene {{ $alergeno->type }}</p>
                            </span>
                        </li>
                    @endforeach
                </ul>

                <p class="precio">{{ number_format($product->price, 2) }} €</p>
                <h3>SOBRE EL PRODUCTO</h3>
                <p>{{ $product->description ?? 'Descripción no disponible.' }}</p>

            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="site-footer">
        <div class="footer-container">
            <img class="footer-bg" src="{{ asset('img/Group 348.png') }}" alt="Fondo del footer">
            @if (Auth::check())
                <form action="{{ route('cesta.add') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1"> {{-- cantidad por defecto --}}
                    <button type="submit" class="btn-add">+ AÑADIR A LA CESTA</button>
                </form>
            @endif

        </div>
    </footer>
@endsection


@push('styles')
    <style>

        /* ===== HEADER ===== */
        .site-header {
            background-color: #fff7ed;
            padding: 15px 40px;
            border-bottom: 1px solid #eee;
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Listas */
        .nav-left,
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-left a,
        .nav-right a,
        .nav-right span {
            text-decoration: none;
            color: #004a34;
            font-weight: 600;
        }

        /* Logo */
        .nav-logo img {
            height: 50px;
            width: auto;
        }

        /* Botón logout */
        .nav-right button {
            background: none;
            border: none;
            color: #004a34;
            font-weight: 600;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-left,
            .nav-right {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .nav-logo img {
                height: 40px;
            }
        }
        /* ===== DETALLE PRODUCTO ===== */
        .detalle-producto {
            padding: 60px;
            background-color: #f8f5ed;
        }

        .detalle-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: flex-start;
        }

        /* Galería 2x2 con todas imágenes igual tamaño */
        .galeria-collage {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 columnas */
            grid-template-rows: repeat(2, 1fr);
            /* 2 filas */
            gap: 12px;
            width: 100%;
            max-width: 400px;
            /* o el tamaño que prefieras */
            border-radius: 20px;
            overflow: hidden;
        }

        .imagen-celda {
            width: 100%;
            aspect-ratio: 1 / 1;
            /* cuadrado perfecto */
            overflow: hidden;
            border-radius: 20px;
        }

        .imagen-celda img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 20px;
        }

        /* Info */
        .detalle-info h1 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #222;
        }

        .detalle-info .precio {
            background: #004d43;
            color: #fff;
            padding: 8px 18px;
            border-radius: 20px;
            display: inline-block;
            font-weight: 700;
            margin-top: 10px;
        }

        .detalle-info h3 {
            margin-top: 20px;
            color: #004d43;
            font-size: 1.1rem;
            text-transform: uppercase;
        }

        .btn-add {
            margin-top: 30px;
            background: #004d43;
            color: #fff;
            padding: 12px 25px;
            border-radius: 30px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-add:hover {
            background: #007a60;
        }

        .alergenos-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
            list-style: none;
            /* quita los puntitos */
            padding: 0;
        }

        .alergenos-list li {
            display: flex;
            align-items: center;
            gap: 8px;
            /* espacio entre imagen y texto */
            background: #fff;
            border: 1.5px solid #004d43;
            border-radius: 25px;
            padding: 6px 12px;
            color: #004d43;
            font-size: 0.9rem;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .alergenos-list li:hover {
            transform: scale(1.05);
            background: #f1fff4;
        }

        .alergenos-list img {
            width: 35px;
            height: 35px;
            object-fit: contain;
            border-radius: 50%;
            background: #fff;
            padding: 4px;
            border: 1px solid #ccc;
        }

        .alergenos-list span p {
            margin: 0;
            font-size: 0.85rem;
            color: #004d43;
            font-weight: 500;
        }


        /*=========Footer =====*/

        /* === FOOTER GENERAL === */
        .site-footer {
            background-color: #006a4a;
            /* verde base */
            padding: 20px 60px;
            /* espacio interno */
            display: flex;
            justify-content: center;
            /* centra el contenedor internamente */
            align-items: center;
        }

        /* === CONTENEDOR INTERNO === */
        .footer-container {
            width: 100%;
            max-width: 1200px;
            /* límite del ancho */
            display: flex;
            justify-content: space-between;
            /* imagen izquierda / botón derecha */
            align-items: center;
        }

        /* === IMAGEN DEL FOOTER === */
        .footer-container img {
            height: 60px;
            width: auto;
            margin-left: 15px;
        }

        /* === BOTÓN DE AÑADIR === */
        .btn-add {
            background-color: transparent;
            color: #fff;
            border: 2px solid #fff;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            background-color: #efff00;
            color: #000;
            border-color: #efff00;
            transform: scale(1.05);
        }



        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                gap: 20px;
            }

            .btn-add {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .detalle-container {
                grid-template-columns: 1fr;
            }

            .galeria-collage {
                max-width: 350px;
            }
        }
    </style>
@endpush
