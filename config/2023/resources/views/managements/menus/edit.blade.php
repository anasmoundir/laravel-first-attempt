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
                                          <i class="fas fa-plus"> modifier le menu {{ $menu->title }}
                                          </i>
                                      </h3>

                                          <form action="{{ route('menus.update', $menu->slug) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                <input type="text" name="title" id="title" class="form-control"
                                                      placeholder="Title" value="{{ $menu->title }}">
                                                <textarea type="text" name="description" id="description" rows="5" cols="30" class="form-control"
                                                      placeholder="Description">
                                                      {{ $menu->description }}
                                                      </textarea>
                                                <div class="form-group mb-3">
                                                      <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" name="price" class="form-control"
                                                            placeholder="price" value="{{ $menu->price }}">
                                                            <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="my-2">
                                                      <img src="{{ asset('images/menus/' . $menu->image) }}" width="200"
                                                            height="200" class="img-fluid" alt="{{ $menu->title }}">
                                              </div>
                                              <div class="form-group mb-3">

                                                  <div class="input-group ">

                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text">Image</span>
                                                      </div>
                                                      <div class="custom-file">
                                                          <input type="file" name="image" class="custom-file-input"
                                                              id="image">
                                                          <label class="custom-file-label" for="image">2 mg max </label>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <select name="category_id" id="category_id" class="from_control">
                                                      <option value="" selected disabled> choisir un categorie
                                                      </option>
                                                      @foreach ($categories as $category)
                                                          <option
                                                              {{ $category->id === $menu->category->id ? 'selected' : '' }}
                                                              value="{{ $category->id }}">
                                                              {{ $category->title }}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                              </div>
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
