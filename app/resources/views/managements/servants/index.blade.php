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
                                <div class="d-flex flex-row  justify-content-between align-items-center border-buttom  pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-user-gear"> Serveurs
                                        </i>
                                    </h3>
                                    <a href="{{ route('servants.create') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom et prenom</th>
                                            <th>adresse</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servants as $servant)
                                            <tr>
                                                <td>{{ $servant->id }}</td>
                                                <td>{{ $servant->name }}</td>
                                                <td>
                                                    @if($servant->adress)
                                                    {{$servant->adress}}
                                                    @else
                                                    <span class="text-danger">
                                                    Non Disponible    
                                                    </span>  
                                                    @endif
                                                    
                                                </td>
                                                <td class="d-flex  flex-row justify-content-center">
                                                    <a href="{{ route('servants.edit', $servant->id) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $servant->id }}"
                                                        action="{{ route('servants.destroy', $servant->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="event.preventDefault(); if(confirm('voulez vous supprimer le serveur {{ $servant->name }} ?'))
                                                        document.getElementById({{ $servant->id }}).submit();"
                                                            class="btn-danger ">

                                                            <i class="fas fa-trash p-3"></i>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex  justify-content-center align-items-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
