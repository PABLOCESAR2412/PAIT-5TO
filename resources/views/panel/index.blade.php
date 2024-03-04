@extends('layouts.app')

@section('title', 'Panel')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                let message = "{{ session('success') }}";
                Swal.fire(message);

            });
        </script>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card w-80 my-2">
                <div class="card-body">
                    <i class="fas fa-users fa-fw fa-3x"></i>
                    <h4 class="card-title">Total Usuarios</h4>
                    <p class="card-text">
                        <span id="total-users"></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card w-80 my-2">
                <div class="card-body">
                    <i class="fas fa-shopping-cart fa-fw fa-3x"></i>
                    <h4 class="card-title">Total Productos</h4>
                    <p class="card-text">
                        <span id="total-products"></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card w-80 my-2">
                <div class="card-body">
                    <i class="fas fa-shopping-cart fa-fw fa-3x"></i>
                    <h4 class="card-title">Total Ventas</h4>
                    <p class="card-text">
                        <span id="total-sales"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="C:\xampp\htdocs\laravel\plantilla_laravel\Punto-de-Venta\public\assets\img\img1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/laravel/plantilla_laravel/Punto-de-Venta/public/assets/img/img1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/laravel/plantilla_laravel/Punto-de-Venta/public/assets/img/img1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        fetch('/est_users')
            .then(response => response.json())
            .then(data => {
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Clients'],
                        datasets: [{
                            label: 'Total Clients',
                            data: [data.totalClients],
                            backgroundColor: 'rgba(75,192,192,1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        window.onload = function user() {
            fetch('/est_users')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('total-users').innerHTML = data.totalUsers;
                });
            fetch('/est_products')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('total-products').innerHTML = data.totalProducts;
                });
            fetch('/est_sales')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('total-sales').innerHTML = data.totalSales;
                });
        };
    </script>


@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!---script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script--->
    <!---script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script--->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endpush
