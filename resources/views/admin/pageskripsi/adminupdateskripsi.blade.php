{{-- {{ dd($mhs, $skripsi, $admin) }} --}}
@extends('template.maintemplate')

@section('title', 'Admin')

@section('title_page', 'Input To Update Skripsi')

@section('section')
    <div class="row">
        <div class="col-12">
            <form method="post" action="adminupdateskripsi">
                @method('patch')
                {{ csrf_field() }}
                <input id="id" name="id" type="hidden" value="{{$skripsi[0]->id_skripsi}}">
                <div class="form-group">
                    <label for="Mahasiswa">Mahasiswa</label>
                    <select class="form-control " id="mahasiswa" name="mahasiswa">
                        @foreach ($mhs as $mhs)
                            @if ($mhs->id == $skripsi[0]->id_mahasiswa)
                                <option value="{{ $mhs->id }}" selected>{{ $mhs->nama }}</option>
                            @else
                                <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                        value ="{{ $skripsi[0]->judul }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Tema">tema</label>
                    <input type="text" class="form-control @error('tema') is-invalid @enderror" id="tema" name="tema"
                        value="{{ $skripsi[0]->tema }}">
                    @error('tema')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Admin">Admin</label>
                    <select class="form-control " id="admin" name="admin">
                        @foreach ($admin as $admin)
                            @if ($admin->id == $skripsi[0]->id_admin)
                                <option value="{{ $admin->id }}"> {{ $admin->nama }}</option>
                            @else
                                <option value="{{ $admin->id }}">{{ $admin->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
