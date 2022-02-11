@extends('layouts.admin')
@section('content')
<main class="earning-main">
    <div class="board">
        @include('layouts.admindesk')
      <div class="content admin-shop">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <form action="{{ route('store.shop') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="Product-name">Product name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Enter product name"
            />
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="product description">Product description</label>
            <input
              type="text"
              class="form-control"
              id="description"
              name="description"
              placeholder="short description"
            />
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
              <label for="product price">Price</label>
              <div class="input-icon">
                  <input type="number" name="price">
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <i>₦</i>
                </div>
            </div>

          <div class="form-group">
            <label for="event-image">EVENT IMAGE</label><br />
            <label class="file">
              <input type="file" name="image" id="file" aria-label="File browser" />
              @error('image')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <span class="file-custom"></span>
            </label>
          </div>

          <button type="submit" class="btn create-btn">Add Product</button>
        </form>
      </div>
    </div>
  </main>
@endsection