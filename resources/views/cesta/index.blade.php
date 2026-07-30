@extends('layouts.app')

@section('content')

<x-header />

<section class="shopping-cart">

    <div class="cart-container">

        <div class="cart-products">

            <h1>🛒 Mi cesta</h1>

            @forelse($cestas as $cesta)

                <div class="cart-item">

                    <img src="{{ asset('img/products/' . $cesta->product->photo) }}"
                        alt="{{ $cesta->product->name }}">

                    <div class="cart-info">

                        <h3>{{ $cesta->product->name }}</h3>

                        <p class="price">
                            {{ number_format($cesta->product->price,2) }} €
                        </p>

                    </div>

                    <form class="quantity-form"
                        action="{{ route('cesta.update',$cesta) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <button
                            type="submit"
                            name="quantity"
                            value="{{ max(1,$cesta->quantity-1) }}">
                            −
                        </button>

                        <span>{{ $cesta->quantity }}</span>

                        <button
                            type="submit"
                            name="quantity"
                            value="{{ $cesta->quantity+1 }}">
                            +
                        </button>

                    </form>

                    <div class="item-total">

                        {{ number_format($cesta->total,2) }} €

                    </div>

                    <form
                        action="{{ route('cesta.destroy',$cesta) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="delete-btn">

                            🗑

                        </button>

                    </form>

                </div>

            @empty

                <div class="empty-cart">

                    <h2>Tu cesta está vacía.</h2>

                </div>

            @endforelse

        </div>


        <div class="cart-summary">

            <h2>Resumen</h2>

            <div>
                <span>Subtotal</span>
                <span>{{ number_format($subtotal,2) }} €</span>
            </div>

            <div>
                <span>Envío</span>
                <span>{{ number_format($gastosEnvio,2) }} €</span>
            </div>

            <hr>

            <div class="total">

                <span>Total</span>

                <span>{{ number_format($total,2) }} €</span>

            </div>

            <button class="checkout-btn">

                REALIZAR PEDIDO

            </button>

        </div>

    </div>

</section>

@endsection

@push('styles')

<style>

.shopping-cart{

    background:#f8f5ed;
    padding:60px;

}

.cart-container{

    display:grid;
    grid-template-columns:2fr 1fr;
    gap:40px;

}

.cart-products h1{

    margin-bottom:30px;
    color:#004d43;

}

.cart-item{

    background:white;
    border-radius:20px;
    display:flex;
    align-items:center;
    gap:20px;
    padding:20px;
    margin-bottom:20px;
    box-shadow:0 8px 18px rgba(0,0,0,.08);

}

.cart-item img{

    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:20px;

}

.cart-info{

    flex:1;

}

.cart-info h3{

    margin-bottom:8px;
    color:#222;

}

.price{

    color:#004d43;
    font-weight:bold;
    font-size:20px;

}

.quantity-form{

    display:flex;
    align-items:center;
    gap:15px;

}

.quantity-form button{

    width:38px;
    height:38px;
    border:none;
    border-radius:50%;
    background:#004d43;
    color:white;
    font-size:22px;
    cursor:pointer;
    transition:.3s;

}

.quantity-form button:hover{

    background:#00795d;

}

.quantity-form span{

    font-size:20px;
    font-weight:bold;
    min-width:25px;
    text-align:center;

}

.item-total{

    font-size:22px;
    font-weight:bold;
    color:#004d43;
    width:90px;
    text-align:right;

}

.delete-btn{

    border:none;
    background:none;
    font-size:26px;
    cursor:pointer;

}

.delete-btn:hover{

    transform:scale(1.2);

}

.cart-summary{

    background:white;
    border-radius:20px;
    padding:30px;
    height:fit-content;
    box-shadow:0 8px 18px rgba(0,0,0,.08);

}

.cart-summary h2{

    color:#004d43;
    margin-bottom:25px;

}

.cart-summary div{

    display:flex;
    justify-content:space-between;
    margin:15px 0;

}

.total{

    font-size:24px;
    font-weight:bold;

}

.checkout-btn{

    margin-top:30px;
    width:100%;
    border:none;
    background:#004d43;
    color:white;
    padding:18px;
    border-radius:50px;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;

}

.checkout-btn:hover{

    background:#efff00;
    color:black;

}

.empty-cart{

    background:white;
    border-radius:20px;
    padding:60px;
    text-align:center;

}

@media(max-width:900px){

    .cart-container{

        grid-template-columns:1fr;

    }

    .cart-item{

        flex-direction:column;
        text-align:center;

    }

    .item-total{

        width:auto;

    }

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

</style>

@endpush