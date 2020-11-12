@extends('template.admin.maintemplate')

@section('title', 'Admin')

@section('section')
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table All skripsi</h3>
                </div>
                <!-- /.card-table -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Mahasiswa</th>
                                <th>Judul</th>
                                <th>Tema</th>
                                <th>Pengurus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skripsi as $data)
                                <tr>
                                    <td>
                                        {{ $data->mahasiswa }}
                                    </td>
                                    <td>
                                        {{ $data->judul }}
                                    </td>
                                    <td>
                                        {{ $data->tema }}
                                    </td>
                                    <td>
                                        {{ $data->admin }}
                                    </td>
                                    <td>
                                        <form action="admineditskripsi" method="POST" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-primary">edit</button>
                                        </form>
                                        <form action="admindeleteskripsi" method="POST" class="d-inline">
                                            @method('post')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id  }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-table -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
