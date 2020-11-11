@extends('template.maintemplate')

@section('title', 'Admin')

@section('title_page', 'Input To Update User')

@section('section')
    <div class="row">
        <div class="col-12">
            <form method="post" action="adminupdateuser">
                @method('patch')
                {{ csrf_field() }}
                @foreach ($user as $user)
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" value="{{ $user->username }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password (the password is hashed !, replace it if you want to change the
                        password)</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" value="{{ $user->password }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control " id="level" name="level" value="{{ $user->level }}">
                        @foreach ($level as $lvl)
                            @if ($lvl == $user->level)
                                <option value="{{ $lvl }}" selected>{{ $lvl }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
                        value="{{ $user->kontak }}">
                    @error('kontak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{ $user->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_identitas">ID User(Nim/Nip)</label>
                    <input type="text" class="form-control @error('id_identitas') is-invalid @enderror" id="id_identitas"
                        name="id_identitas" value="{{ $user->id_identitas }}">
                    @error('id_identitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_skripsi">ID_Skripsi</label>
                    <input type="text" class="form-control @error('id_skripsi') is-invalid @enderror" id="id_skripsi"
                        name="id_skripsi" value="{{ $user->id_skripsi }}">
                    @error('id_skripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                @endforeach
            </form>
        </div>
    </div>
@endsection
