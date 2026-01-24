@extends('layouts.app')

@section('content')
    <x-header />

    {{-- TÍTULO Y SUBTÍTULO --}}
    <section class="productos-section" style="padding-top: 50px;">
        <div class="titulo-link">
            <h2>🥗 Todos nuestros productos</h2>
        </div>

        {{-- GRID COMPLETO --}}
        @php
            $productosNormales = $products->where('category_id', 1);
        @endphp

        <h2>🍽️ Productos Normales</h2>
        <div class="productos-grid">
            @foreach ($productosNormales as $product)
                <div class="producto-card">
                    <a href="{{ route('productos.show', $product->id) }}">
                        <img src="{{ asset('img/products/' . $product->photo) }}">
                        <h3>{{ strtoupper($product->name) }}</h3>
                        <p>{{ number_format($product->price, 2) }} €</p>
                    </a>
                </div>
            @endforeach
        </div>

        @php
            $productosDelivery = $products->where('category_id', 2);
        @endphp

        <h2>🚀 Productos Delivery</h2>
        <div class="productos-grid">
            @foreach ($productosDelivery as $product)
                <div class="producto-card">
                    <a href="{{ route('productos.show', $product->id) }}">
                        <img src="{{ asset('img/products/' . $product->photo) }}">
                        <h3>{{ strtoupper($product->name) }}</h3>
                        <p>{{ number_format($product->price, 2) }} €</p>
                    </a>
                </div>
            @endforeach
        </div>


    </section>


    {{-- FOOTER --}}
    <x-footer />
@endsection


@push('styles')
    <style>
        body {
            background-color: #fff7ed;
            font-family: 'Inter', sans-serif;
        }

        a {
            text-decoration: none;
        }

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


        /* ==== TITULOS ==== */
        .titulo-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .titulo-link h2 {
            font-size: 2.5rem;
            color: #333;
            margin: 0;
        }

        /* ==== GRID ==== */
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .producto-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s ease;
        }

        .producto-card:hover {
            transform: translateY(-5px);
        }

        .producto-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .producto-card h3 {
            color: #222;
            margin-bottom: 8px;
        }

        .producto-card p {
            color: #d2e300;
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* ==== GRID ==== */
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
        }

        /* ==== PRODUCTO CARD ==== */
        .producto-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        /* Efecto hover */
        .producto-card:hover {
            transform: scale(1.04);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);
        }

        /* ==== IMÁGENES UNIFORMES ==== */
        .producto-card img {
            width: 100%;
            height: 180px;
            /* 👈 TODAS MISMA ALTURA */
            object-fit: cover;
            /* 👈 Recorta la imagen sin deformarla */
            border-radius: 10px;
            margin-bottom: 15px;
        }

        /* ==== TITULOS INTERNOS ==== */
        .producto-card h3 {
            color: #222;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        /* ==== PRECIO ==== */
        .producto-card p {
            color: #d2e300;
            font-weight: bold;
            font-size: 1.1rem;
        }

        /* ======== FOOTER ======== */
        .site-footer {
            position: relative;
            background: #004a34;
            padding: 60px 20px 80px;
            overflow: hidden;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
            position: relative;
            z-index: 2;
            color: #f6f3e8;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-links a {
            color: #f6f3e8;
            text-decoration: none;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: opacity 0.3s;
        }

        .footer-links a:hover {
            opacity: 0.8;
        }

        .footer-logo {
            position: absolute;
            bottom: -105%;
            left: 50%;
            transform: translateX(-50%);
            pointer-events: none;
        }


        .footer-logo img {
            width: clamp(300px, 55vw, 800px);
            height: auto;
            max-width: 100%;
            display: block;
        }


        /* ======== RESPONSIVE ======== */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }

            .footer-links {
                flex-direction: column;
                align-items: center;
            }

            .footer-logo {
                bottom: -45%;
                display: flex;
                justify-content: center
            }

            .footer-logo img {
                width: 70%;
                max-width: 320px;
            }
        }
    </style>
@endpush
