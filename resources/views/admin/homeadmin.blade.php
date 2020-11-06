@extends('template.maintemplate')

@section('title','Admin')

@section('section')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Table Mahasiswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 685px;">
          <table class="table table-head-fixed text-nowrap">
            <thead class="thead">
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Nama</th>
                <th>ID User</th>
                <th>credetial</th>
                <th>Skripsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $user)
                  <tr>
                      <td>
                        {{$user->username}}
                      </td>
                      <td>
                        {{$user->email}}
                      </td>
                      <td>
                        {{$user->kontak}}
                      </td>
                      <td>
                        {{$user->nama}}
                      </td>
                      <td>
                        {{$user->id_identitas}}
                      </td>
                      <td>
                        {{$user->creadential}}
                      </td>
                      <td>
                        {{$user->id_skripsi}}
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
