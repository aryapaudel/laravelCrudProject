@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-4">
                <div class="card">
                    <p>Name: <b>{{ $product->name }}</b></p>
                    <p>Description: <b>{{ $product->description }}</b></p>
                    <img src="/products/{{ $product->image }}", class: "card-img-top rounded" , width: "100%" if
                        product.image.present?>
                </div>
            </div>
        </div>

    </div>
@endsection
