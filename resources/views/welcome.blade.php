@extends('layouts.app')

@section('content')
    <div class="container vh-100">

        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Benvenuti nel mio portfolio</h1>
            </div>
        </div>

        <!-- Sezione Chi sono -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Chi sono</h2>
                <p>Ciao! Mi chiamo Paul e sono un programmatore con la passione per lo sviluppo web. In questo
                    portfolio potrete vedere alcuni dei miei progetti più recenti.</p>
            </div>

            <!-- Sezione Cosa faccio -->
            <div class="col-md-6">
                <h2>Cosa faccio</h2>
                <p>Mi specializzo nello sviluppo di siti web responsive e applicazioni web utilizzando HTML, SCSS,
                    JavaScript, PHP e framework come Laravel e Vue. Mi piace creare interfacce intuitive e dal design
                    accattivante.</p>
            </div>
        </div>

        <!-- Sezione I miei progetti -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h2>I miei progetti</h2>
            </div>
        </div>

        <div class="row mt-3">

            <!-- Progetto 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://t3.ftcdn.net/jpg/05/20/48/46/360_F_520484683_j4f2om7llvZD1aoL9HPZ2LmDeWWZoWK0.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Progetto 1</h5>
                        <p class="card-text">Descrizione Progetto ancora da inserire</p>
                        <a href="#" class="btn btn-primary hoverable">Vedi progetto</a>
                    </div>
                </div>
            </div>

            <!-- Progetto 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://t3.ftcdn.net/jpg/05/20/48/46/360_F_520484683_j4f2om7llvZD1aoL9HPZ2LmDeWWZoWK0.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Progetto 2</h5>
                        <p class="card-text">Descrizione progetto ancora da inserire</p>
                        <a href="#" class="btn btn-primary hoverable">Vedi progetto</a>
                    </div>
                </div>
            </div>

            <!-- Progetto 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://t3.ftcdn.net/jpg/05/20/48/46/360_F_520484683_j4f2om7llvZD1aoL9HPZ2LmDeWWZoWK0.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Progetto 3</h5>
                        <p class="card-text">Descrizione progetto ancora da inserire</p>
                        <a href="#" class="btn btn-primary hoverable">Vedi progetto</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
