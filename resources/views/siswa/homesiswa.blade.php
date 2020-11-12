@extends('template.mahasiswa.maintemplate')

@section('title', 'Mahasiswa')

@section('section')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Selamat Datang</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="card bg-gradient-success">
        <div class="card-header border-0">

            <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
            </h3>
            <!-- tools card -->
            <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                        data-offset="-52">
                        <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                        <a href="#" class="dropdown-item">Add new event</a>
                        <a href="#" class="dropdown-item">Clear events</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body pt-0">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">
                Pengumuman
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="callout callout-danger">
                <h5>I am a danger callout!</h5>

                <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                    soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.</p>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
