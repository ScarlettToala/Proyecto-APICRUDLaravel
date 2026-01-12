@extends('layouts.app')

@section('content')
    <div class="ventana-flotante">
        <strong><a href="/">HOME</a></strong>

        <!-- ALERTA DE ÉXITO -->
        @if (session('success'))
            <div id="alert-success" class="alert alert-success"
                style="
            background: #e9fff1;
            color: #006a4a;
            border: 1px solid #00a86b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        ">
                {{ session('success') }}
            </div>

            <script>
                // Oculta el mensaje después de 10 segundos
                setTimeout(function() {
                    const alertDiv = document.getElementById('alert-success');
                    if (alertDiv) {
                        alertDiv.style.transition = "opacity 0.5s ease";
                        alertDiv.style.opacity = 0;
                        setTimeout(() => alertDiv.remove(), 500);
                    }
                }, 1000);
            </script>
        @endif


        @forelse ($cestas as $item)
            <div class="producto-cesta-item">
                <img src="{{ asset('img/products/' . $item->product->photo) }}" alt="{{ $item->product->name }}">

                <div class="info-producto">
                    <p class="nombre">{{ $item->product->name }}</p>
                    <p class="precio">{{ number_format($item->product->price, 2) }} €</p>

                    <div class="cantidad">
                        <!-- FORM UPDATE -->
                        <form class="form-update" action="{{ route('cesta.update', $item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" />
                            <button type="submit" class="btn-actualizar">Actualizar</button>
                        </form>

                        <!-- FORM DELETE -->
                        <form class="form-eliminar" action="{{ route('cesta.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay productos en la cesta.</p>
        @endforelse

        @if ($cestas->isNotEmpty())
            <div class="resumen-pago">
                <p>SUBTOTAL: {{ number_format($subtotal, 2) }} €</p>
                <p>GASTOS DE ENVÍO: {{ number_format($gastosEnvio, 2) }} €</p>
                <p class="total">TOTAL: {{ number_format($total, 2) }} €</p>
                <button class="checkout">CHECKOUT</button>
            </div>
        @endif
    </div>

    <x-footer/>
@endsection

@push('styles')
    <style>
        /* ======== GENERAL ======== */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f7f2;
            color: #1c1c1c;
            margin: 0;
            padding: 0;
        }

        /* ======== VENTANA FLOTE ======== */
        .ventana-flotante {
            width: 400px;
            max-width: 95%;
            background-color: #f3f2ea;
            margin: 2rem auto;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* ======== PRODUCTOS ======== */
        .producto-cesta-item {
            display: flex;
            gap: 1rem;
            background-color: #fff;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            align-items: center;
        }

        .producto-cesta-item img {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            object-fit: cover;
        }

        .info-producto {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .info-producto .nombre {
            font-weight: 600;
            margin: 0 0 0.3rem 0;
        }

        .info-producto .precio {
            color: #198754;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* ======== FORM UPDATE ======== */
        .form-update {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-update input[type="number"] {
            width: 50px;
            padding: 0.25rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-actualizar {
            background-color: #198754;
            color: #fff;
            border: none;
            padding: 0.4rem 0.7rem;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-actualizar:hover {
            background-color: #145c3d;
        }

        /* ======== FORM DELETE ======== */
        .form-eliminar {
            margin-top: 0.5rem;
        }

        .btn-eliminar {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 0.4rem 0.7rem;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-eliminar:hover {
            background-color: #a71d2a;
        }

        /* ======== RESUMEN ======== */
        .resumen-pago {
            border-top: 1px solid #ccc;
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .resumen-pago p {
            display: flex;
            justify-content: space-between;
            margin: 0.3rem 0;
        }

        .resumen-pago .total {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .checkout {
            width: 100%;
            background-color: #004d2c;
            color: #fff;
            border: none;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 0.8rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .checkout:hover {
            background-color: #007044;
        }

        /* ======== RESPONSIVE ======== */
        @media (max-width: 480px) {
            .producto-cesta-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-update {
                width: 100%;
            }

            .form-update input {
                width: 100%;
            }
        }
    </style>
@endpush
