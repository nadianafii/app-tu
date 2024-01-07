@extends('layouts.template')

@section('content')
    <form action="{{ route('guru.store') }}" class="card mt-3 p-5" method="POST">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg nya bakal dimunculin disini --}}
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
        @csrf
        <div class="mb-3 row">
            <label for="name" class="form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection