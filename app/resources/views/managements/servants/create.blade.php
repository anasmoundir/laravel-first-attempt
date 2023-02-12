@extends('layouts\app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Sidebar
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary  border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"> ajoute un server
                                    </i>
                                </h3>
                                <form action="{{ route('servants.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="name" name="name" id="name" class="form-control"
                                            placeholder="name && prenom ">
                                    </div>
                                    <div class="form-group">
                                          <input type="adress" name="adress" id="address" class="form-control"
                                              placeholder="adresse">
                                      </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Valider
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
