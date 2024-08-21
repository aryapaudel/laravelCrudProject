<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Laravel Crud</title>
</head>

<body>


    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="/">Products</a>
            </li>

        </ul>


    </nav>

    <div class="container">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-2">New Product</a>
        </div>

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action Button</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td><a href="products/{{ $product->id }}/show" class="text-dark">{{ $product->name }}</a></td>
                        <td>
                            <img src="products/{{ $product->image }}" class="rounded-circle"  width="30" height="50" alt=""/>
                        </td>
                        <td>
                            <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>


                            <form action="products/{{ $product->id }}/delete"method="POST"class="d-inline">
                                @csrf
                                @method('DELETE')
                            <button type="submit"class="btn btn-danger btn-sm">Delete</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

    </div>

</body>

</html>
