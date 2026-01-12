@extends('layouts.app')

@section('content')
    <x-header />

    {{-- TÍTULO Y SUBTÍTULO --}}
    <section class="productos-section" style="padding-top: 50px;">
        <div class="titulo-link">
            <h2>🥗 Todos nuestros productos</h2>
            <a href="/">Volver al inicio</a>
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
    <footer class="site-footer">
        <img class="footer-bg" src="{{ asset('img/footer.png') }}" alt="Fondo del footer">
        <div class="footer-container">
            <div class="footer-links left">
                <a href="#">SOBRE NOSOTROS</a>
                <a href="#">COMIDA</a>
                <a href="#">HISTORIAL</a>
                <a href="#">ENVÍOS</a>
            </div>

            <div class="footer-links right">
                <a href="#">MI CUENTA</a>
                <a href="#">CONTACTO</a>
                <a href="#">BLOG</a>
            </div>
        </div>
    </footer>
@endsection


@push('styles')
    <style>
        body {
            background-color: #fff7ed;
            font-family: 'Inter', sans-serif;
        }
        a{
            text-decoration: none;
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

        .titulo-link a {
            color: #000;
            border: 2px solid #000;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s;
            font-weight: bold;
        }

        .titulo-link a:hover {
            background: #efff00;
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
    height: 180px;           /* 👈 TODAS MISMA ALTURA */
    object-fit: cover;       /* 👈 Recorta la imagen sin deformarla */
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

    </style>
@endpush
