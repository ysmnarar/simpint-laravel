@extends('Template.base')

@section('title', 'Book')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Book</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index.product')}}">Home</a></li>
                    <li class="breadcrumb-item active">Data Book</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ENd Header -->

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between" style="display: flex">
                        <a href="{{ route('admin.form.product')}}" class="btn btn-primary btn-md ">Add Book</a>
                        <div class="card-tools">
                            <div class="input-group input-group input-group-sm" style="width: 170px;">
                                <form action="{{ route('product.search')}}" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control float-right"
                                            placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-bottom">
                        <a href="{{ route('book.romance')}}" class="btn btn-light btn-md">Romance</a>
                        <a href="{{ route('book.horror')}}" class="btn btn-light btn-md">Horror</a>
                        <a href="{{ route('book.mystery')}}" class="btn btn-light btn-md">Mystery</a>
                        <a href="{{ route('book.fantasy')}}" class="btn btn-light btn-md">Fantasy</a>
                        <a href="{{ route('book.teen.fiction')}}" class="btn btn-light btn-md">Teen Fiction</a>
                        <a href="{{ route('book.adventure')}}" class="btn btn-light btn-md">Adventure</a>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create -->
                        @if (Session::get('Create'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('Create') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- End Alert Create -->

                        <!-- Alert Update -->
                        @if (Session::get('Update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('Update') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- End Alert Update -->

                        <!-- Alert Delete -->
                        @if (Session::get('Delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('Delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- End Alert Delete -->

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Writer Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $row)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->writer_name }}</td>
                                        <td>
                                            <img style="width: 90px; height: 100px; border-radius: 15px;"
                                                src="{{asset('storage/' . $row->img)}}" alt="{{ $row->name }}"
                                                class="img-fluid">
                                        </td>
                                        <td>{{ $row->category_id }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td>
                                            <a href="#" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#desc{{ $row->id }}">desc</i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit.product', $row->id)}}"
                                                class="btn btn-secondary btn-sm"><i class="fa-solid fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $row->id }}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('Admin.Product.descProduct')
                                    @include('Admin.Product.deleteProduct')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Content -->
@endsection