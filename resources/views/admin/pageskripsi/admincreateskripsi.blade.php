{{-- {{ dd($mhs) }} --}}
@extends('template.admin.maintemplate')

@section('title', 'Admin')

@section('title_page', 'Input To Create Skripsi')

@section('section')
    <div class="row">
        <div class="col-12">
            <form method="post" action="adminstoreskripsi">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="Mahasiswa">Mahasiswa</label>
                    <select class="form-control " id="mahasiswa" name="mahasiswa">
                        @foreach ($mhs as $mhs)
                            @if ($mhs->id == old('mahasiswa'))
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
                        value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Tema">tema</label>
                    <input type="text" class="form-control @error('tema') is-invalid @enderror" id="tema" name="tema"
                        value="{{ old('tema') }}">
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
                            @if ($admin->id == old('admin'))
                                <option value="{{ $admin->id }}" selected>{{ $admin->nama }}</option>
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
