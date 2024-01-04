<?php $a = "Dashboard" ?>
@extends("../layouts.layout")

@section("title",$a)

@section("content")


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    @if(session('success'))
        <h1 class="h3 mb-0 text-center text-success">{{session('success')}}</h1>
    @endif
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <button type="button" class="btn btn-success my-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add User
                </button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">No. SIM</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($myCustomer as $key => $post)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{!! $post->name !!}</td>
                            <td>{!! $post->email !!}</td>
                            <td>{!! $post->alamat !!}</td>
                            <td>{!! $post->telepon !!}</td>
                            <td>{!! $post->no_sim !!}</td>
                            <td class="text-center">

                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('manage.destroy', $post->id) }}" method="POST">
                                    <a href="{{ route('manage.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Customer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{route ('cars.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf 
                                            @method('PUT')
                                            <div class="row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="name" class="form-label">Nama Lengkap</label>
                                                        <input type="hidden" name="status" id="status" value="{{$post->status}}"
                                                            class="form-control" required>
                                                        <input type="text" name="name" id="name" value="{{$post->name}}"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="telepon" class="form-label">Telepon</label>
                                                        <input type="text" name="telepon" id="telepon" value="{{$post->telepon}}"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email" value="{{$post->email}}"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="sim" class="form-label">Nomor SIM</label>
                                                        <input type="text" name="no_sim" id="sim" value="{{$post->no_sim}}"
                                                            class="form-control" required>
                                                    </div>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                    <div class="col-xl-8">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{$post->alamat}}" required>
                                                    </div>
                                                    <div class="col-xl-4 mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control form-control"
                                                            name="password" id="password">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        @empty
                        <div class="alert alert-danger">
                            Data Post belum Tersedia.
                        </div>
                        @endforelse
                    </tbody>
                </table>
                <!-- $posts->links() -->


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pelanggan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="border border-light p-4 rounded" action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf <!-- {{ csrf_field() }} -->
                                    <div class="row">
                                        <div class="col-xl-3 mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control form-control-sm" required>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input type="text" name="telepon" id="telepon"
                                                class="form-control form-control-sm" required>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control form-control-sm" required>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="sim" class="form-label">Nomor SIM</label>
                                            <input type="text" name="no_sim" id="sim"
                                                class="form-control form-control-sm" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-3">
                                        <div class="col-xl-5">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea type="text" name="alamat" id="alamat"
                                                class="form-control form-control-sm" required></textarea>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-sm" required
                                                name="password" id="password">
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="konfir" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control form-control-sm"
                                                onfocusout="myConfirm()" required id="konfir">
                                            <input type="hidden" value="1" name="status">
                                            <p id="warning"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer input-group">
                                    <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="submit" name="submit" class="form-control btn btn-primary">Add</button>
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