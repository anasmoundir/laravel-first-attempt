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
                                <div class="d-flex flex-row  justify-content-between align-items-center border-buttom  pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-th-list"> categories
                                        </i>
                                    </h3>
                                    <a href="{{ route('tables.create') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i>table
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>name</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tables as $table)
                                            <tr>
                                                <td>{{ $table->id }}</td>
                                                <td>{{ $table->name }}</td>
                                                <td>
                                                    @if ($table->status)
                                                        <span class="badge bg-success">
                                                            OUI </span>
                                                    @else
                                                        <span class="badge bg-danger">
                                                            NON </span>
                                                    @endif

                                                </td>
                                                <td class="d-flex  flex-row justify-content-center">
                                                    <a href="{{ route('tables.edit', $table->slug) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $table->id }}"
                                                        action="{{ route('tables.destroy', $table->slug) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="event.preventDefault(); if(confirm('voulez vous supprimer la table {{ $table->name }} ?'))
                                                        document.getElementById({{ $table->id }}).submit();"
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
