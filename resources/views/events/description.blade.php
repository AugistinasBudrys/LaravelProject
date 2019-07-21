@extends('layouts.app')
@section('content')

    <div class="container ">

        <div class="row">

            <div class="col-md-9">

                <!-- Pavadinimas -->
                <h2 class="m-2">Restorano pavadinimas</h2>

                <hr>
                <!-- Date -->
                <p>Date</p>
                <hr>

                <!-- Image -->
                <div class="p-2"><img class="img-fluid" src="http://placehold.it/900x300" alt=""></div>
                <hr>

                <!-- 5 smaller images -->
                <div class="d-flex align-items-start">
                    <div class="p-2"><img class="img-fluid " src="http://placehold.it/900x300" alt=""></div>
                    <div class="p-2"><img class="img-fluid " src="http://placehold.it/900x300" alt=""></div>
                    <div class="p-2"><img class="img-fluid " src="http://placehold.it/900x300" alt=""></div>
                    <div class="p-2"><img class="img-fluid " src="http://placehold.it/900x300" alt=""></div>
                    <div class="p-2"><img class="img-fluid " src="http://placehold.it/900x300" alt=""></div>
                </div>

                <hr>

                <!-- Description -->
                <div class="card">
                    <h5 class="card-header">Description</h5>
                    <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero,
                            obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis
                            eligendi eos magni recusandae laborum minus inventore?</p>
                    </div>
                </div>

                <hr>

                <!-- Papildoma informacija -->
                <div class="card w-50 my-2">
                    <div class="card-body">
                        <h5 class="card-title">Papildoma informacija 1</h5>
                        <p class="card-text">Meniu</p>
                    </div>
                </div>

                <div class="card w-50 my-2">
                    <div class="card-body">
                        <h5 class="card-title">Papildoma informacija 2</h5>
                        <p class="card-text">Atsiliepimai</p>
                    </div>
                </div>

                <div class="card w-50 my-2">
                    <div class="card-body">
                        <h5 class="card-title">Papildoma informacija 3</h5>
                        <p class="card-text">Kontaktai</p>
                    </div>
                </div>

            </div>

            <div class="col-md-3">

                <!-- Administratoriaus veikla -->
                <div class="card m-2">
                    <h5 class="card-header">Administratorius</h5>
                    <div class="card-body">
                        <h6 class="card-title">Administratoriaus veiksmai</h6>
                        <a href="#" class="btn btn-primary my-2">Prideti restoraną</a>
                        <a href="#" class="btn btn-primary my-2">Ištrinti restoraną</a>
                        <a href="#" class="btn btn-primary my-2">Redaguoti restoraną</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
