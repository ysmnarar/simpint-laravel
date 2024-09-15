@extends('Template.base')

@section('title', 'Data User')

@section('content')
<!-- Header -->
<section class="content-header">
     <div class="container-fluid">
          <div class="row mb-2">
               <div class="col-sm-6">
                    <h1>Data User</h1>
                    <h3 style="margin-left: 15px;">Role : <br></h3>
                    <h4 style="margin-left: 20px;">1 = Admin <br>
                         2 = User</h4>
               </div>
               <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="{{ route('index.user')}}">Home</a></li>
                         <li class="breadcrumb-item active">Data User</li>
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
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Role</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($user as $row)
                                                       <tr>
                                                             <td>{{ $loop->iteration }}</td>
                                                             <td>{{ $row->name }}</td>
                                                             <td>{{ $row->email }}</td>
                                                             <td>{{ $row->role }}</td>
                                                             <td>
                                                                   <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                         data-target="#delete{{ $row->id }}"><i
                                                                                class="fa-solid fa-trash-can"></i></a>
                                                             </td>
                                                       </tr>
                                                       @include('Admin.User.deleteUser')
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