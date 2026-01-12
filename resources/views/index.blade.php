@extends('layouts.app')

@section('content')
    <x-header-home />

    {{-- Contenedor principal con la imagen --}}
    <x-backgroundFrase title="BORN TO EAT MEAT." image="{{ asset('img/backgroundPrincipal.webp') }}" link="#"
        link-text="Empezar a explorar" />

    {{-- SECCIÓN PRODUCTOS --}}
    <section id="productos" class="productos-section">
        <div class="titulo-link">
            <h2>&#x1F36A; Nuestros productos </h2>
            <a href="/productos">Ver todos los productos</a>
        </div>
        <div class="productos-grid">
            @foreach ($products->take(4) as $product)
                <div class="producto-card">
                    <a href="{{ route('productos.show', $product->id) }}">
                        <img src="{{ asset('img/products/' . $product->photo) }}" alt="{{ $product->name }}">
                        <h3>{{ strtoupper($product->name) }}</h3>
                        <p>{{ number_format($product->price, 2) }} €</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- PRODUCTOS DESTACADOS --}}
    <section class="productos-destacados">
        <div class="titulo-imagen">
            <h2>★ Productos destacados</h2>
            <img src="img/Group 348.png" alt="Verduras">
        </div>
        <div class="productos-grid">
            @foreach ($products->slice(4, 3) as $normal_product)
                <div class="producto-card destacado">
                    <a href="{{ route('productos.show', $normal_product->id) }}">
                        <img src="{{ asset('img/products/' . $normal_product->photo) }}" alt="{{ $normal_product->name }}">
                        <h3>{{ strtoupper($normal_product->name) }}</h3>
                        <p>{{ number_format($normal_product->price, 2) }} €</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <x-footer />
@endsection


@push('styles')
    <style>
        body {
            background-color: #fff7ed;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ======== HERO ======== */
        .hero-banner {
            background-size: cover;
            background-position: center;
            width: 100%;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: #fff;
            padding: 20px 40px;
        }

        .hero-content h1 {
            font-size: 5rem;
            color: #efff00;
            font-weight: 800;
        }

        .hero-button {
            display: inline-block;
            background: #fff;
            color: #000;
            padding: 12px 25px;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.3s;
        }

        .hero-button:hover {
            background: #efff00;
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


        /* ======== PRODUCTOS ======== */
        a {
            text-decoration: none;
        }

        .productos-section,
        .productos-destacados {
            padding: 60px 40px;
        }

        .productos-destacados {
            background-color: #006a4a;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .titulo-link,
        .titulo-imagen {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .titulo-link h2,
        .titulo-imagen h2 {
            font-size: 2.5rem;
            margin: 0;
        }

        .titulo-link h2 {
            color: #333;
        }

        .titulo-imagen h2 {
            color: #efff00;
        }

        .titulo-link a {
            border: 2px solid #000;
            color: #000;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .titulo-imagen img {
            height: 50px;
            width: auto;
            margin-left: 15px;
        }

        .productos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .producto-card {
            background: #fff;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .producto-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .producto-card h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .producto-card p {
            font-weight: bold;
            color: #d2e300;
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
