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
                                    <i class="fas fa-plus"> modifier une la table {{ $table->name }}
                                    </i>
                                </h3>

                                <form action="{{ route('tables.update', $table->slug) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Title" value="{{ $table->name }}">
                                    </div>
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="" disabled>
                                                Disponible
                                            </option>
                                            <option {{ $table->status === 1 ? 'selected' : '' }} value="1">Oui</option>
                                            <option {{ $table->status === 0 ? 'selected' : '' }} value="0">Non</option>
                                        </select>
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
