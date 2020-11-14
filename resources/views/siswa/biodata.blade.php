@extends('template.mahasiswa.maintemplate')

@section('title', 'Mahasiswa')

@section('section')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Biodata Mahasiswa</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="mahasiswa">Home</a></li>
                    <li class="breadcrumb-item active">Biodata Mahasiswa</li>
                </ol>
            </div>
        </div>
    </div>
    @foreach ($user as $user)
    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ $user->id_identitas }} / {{ $nama }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">UserName</dt>
                        <dd class="col-sm-8">{{ $user->username }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>
                        <dt class="col-sm-4">Nama</dt>
                        <dd class="col-sm-8">{{ $nama }}</dd>
                        <dt class="col-sm-4">NIM</dt>
                        <dd class="col-sm-8">{{ $user->id_identitas }}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @endforeach
@endsection
