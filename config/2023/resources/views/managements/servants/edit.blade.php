@extends('layouts\app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary  border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"> modifier le server {{ $servant->name }}
                                    </i>
                                </h3>

                                <form action="{{ route('servants.update', $servant->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="name" name="name" id="name" class="form-control"
                                            placeholder="Title" value="{{ $servant->name }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="adress" id="adress" class="form-control"
                                            placeholder="Title" value="{{ $servant->adress }}">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
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
