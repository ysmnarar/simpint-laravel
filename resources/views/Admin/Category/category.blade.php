@extends('Template.base')

@section('title', 'Book Category')

@section('content')
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Book Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index.category')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Book Category</li>
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
                            <a href="{{ route('admin.form.category') }}" class="btn btn-primary btn-md">Add Book Category</a>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <form action="{{ route('category.search')}}" method="get">
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
                                        <th>No.</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->category }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit.category', $row->id) }}"
                                                    class="btn btn-secondary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $row->id }}"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                        @include('Admin.Category.deleteCategory')
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
