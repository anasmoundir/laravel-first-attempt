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
                                        <i class="fas fa-user-clipboard-list"> menu
                                        </i>
                                    </h3>
                                    <a href="{{ route('menus.create') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>title</th>
                                            <th>Description</th>
                                            <th>Prix </th>
                                            <th>Category </th>
                                            <th>Image </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->id }}</td>
                                                <td>{{ $menu->title }}</td>
                                                <td>{{ substr($menu->description, 0, 100) }}</td>
                                                <td>{{ $menu->price }} DH</td>
                                                <td>{{ $menu->category->title }}</td>
                                                <td>
                                                    <img src="{{ asset('images/menus/' . $menu->image) }}"
                                                        alt="{{ $menu->title }}" class="fluid rounded" width="90"
                                                        height="90">




                                                </td>

                                                <td class="d-flex  flex-row justify-content-center">
                                                    <a href="{{ route('menus.edit', $menu->slug) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $menu->id }}"
                                                        action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="event.preventDefault(); if(confirm('voulez vous supprimer le menu {{ $menu->title }} ?'))
                                                        document.getElementById({{ $menu->id }}).submit();"
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
                                    {{ $menus->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
