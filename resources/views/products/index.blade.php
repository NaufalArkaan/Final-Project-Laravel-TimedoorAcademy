@extends('layouts.app')

@section('content')
<h1 class="mb-3">Products</h1>

<div class="d-flex justify-content-between mb-3">
    <form action="{{ route('products.create') }}" method="get">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i></> Create Product
        </button>
    </form>

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('products.index', ['sort' => 'name', 'direction' => 'asc']) }}">
                Name (A-Z)
                @if (request()->sort === 'name' && request()->direction === 'asc')
                <i class="fas fa-sort-alpha-up"> </i>
                @elseif (request()->sort === 'name')
                <i class="fas fa-sort"> </i>
                @else
                <i class="fas fa-sort-alpha-down-alt"> </i>
                @endif
            </a>
            <a class="dropdown-item" href="{{ route('products.index', ['sort' => 'price', 'direction' => 'asc']) }}">
                Price
                @if (request()->sort === 'price' && request()->direction === 'asc')
                @elseif (request()->sort === 'price')
                @endif
            </a>
            <a class="dropdown-item" href="{{ route('products.index', ['sort' => 'stock', 'direction' => 'asc']) }}">
                Stock
                @if (request()->sort === 'stock' && request()->direction === 'asc')
                @elseif (request()->sort === 'stock')
                @endif
            </a>
            {{-- <a class="dropdown-item" href="{{ route('products.sort', ['sort_by' => 'name', 'sort_direction' => 'desc']) }}">Name (Z-A)</a>
            <a class="dropdown-item" href="{{ route('products.sort', ['sort_by' => 'price', 'sort_direction' => 'asc']) }}">Price (Low-High)</a>
            <a class="dropdown-item" href="{{ route('products.sort', ['sort_by' => 'price', 'sort_direction' => 'desc']) }}">Price (High-Low)</a> --}}
        </div>
    </div>

    <form class="d-flex">
        <div class="input-group flex-nowrap">
            <input type="text" name="search" placeholder="Find Product..." class="form-control mr-2" value="{{ request()->search }}">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i></> Search
            </button>
        </div>
    </form>
</div>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    @foreach($products as $product)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{ asset('storage/images/'.$product->image) }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="card-text">
                    Quantity: {{ $product->stock }}
                    <span class="float-right">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                        </>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $products->links() }}
@endsection

{{-- {{ $Products->links() }} --}}
<style>
    .card {
        transition: transform.3s ease-in-out;
        width: 250px;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        height: 100%;
        object-fit: cover;
    }

    @media (max-width: 767.98px) {
        .card-img-top {
            height: 150px;
        }
    }

    .float-right {
        float: right;
        margin-left: 10px;
    }

    .text-danger {
        color: #dc3545;
    }

    .text-primary {
        color: #337ab7;
    }

</style>

