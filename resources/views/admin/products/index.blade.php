@extends('admin.layout')

@section('title', 'Products')
@section('heading', 'Products')
@section('subheading', 'Manage product catalog shown on the website')

@section('content')
<div class="admin-panel">
    <div class="admin-toolbar">
        <h2>{{ $products->count() }} products</h2>
        <a class="btn" href="{{ route('admin.products.create') }}">Add product</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Code</th>
                <th>Tag</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->sort_order }}</td>
                    <td>
                        <strong>{{ $product->name }}</strong><br>
                        <span style="color:#6b7077">{{ $product->slug }}</span>
                    </td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->tag }}</td>
                    <td>
                        <div class="admin-actions">
                            <a class="btn btn-secondary" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                            <form method="post" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
