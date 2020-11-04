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
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Skripsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mahasiswa as $mhs)
                  <tr>
                      <td>
                        {{$mhs->nim}}
                      </td>
                      <td>
                        {{$mhs->nama}}
                      </td>
                      <td>
                        {{$mhs->email}}
                      </td>
                      <td>
                        {{$mhs->kontak}}
                      </td>
                      <td>
                        {{$mhs->skripsi_id_skripsi}}
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
