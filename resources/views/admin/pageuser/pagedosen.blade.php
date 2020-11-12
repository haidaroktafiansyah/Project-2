@extends('template.admin.maintemplate')

@section('title', 'Admin')


@section('section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Dosen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Kontak</th>
                                <th>Nama</th>
                                <th>ID User</th>
                                <th>credetial</th>
                                <th>Skripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->kontak }}
                                    </td>
                                    <td>
                                        {{ $user->nama }}
                                    </td>
                                    <td>
                                        {{ $user->id_identitas }}
                                    </td>
                                    <td>
                                        {{ $user->level }}
                                    </td>
                                    <td>
                                        {{ $user->id_skripsi }}
                                    </td>
                                    <td>
                                        <form action="adminedituser" method="POST" class="d-inline">
                                            @method('post')
                                            @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                            <button type="submit" class="btn btn-primary">edit</button>
                                        </form>
                                        <form action="" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
