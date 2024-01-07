@extends('layouts.template')

@section('content')
<div class="card">
        <div class="card-body">
            <form action="{{ route('guru.update', $guru['id']) }}" method="POST">
                @csrf
                @method('PATCH')

                @if($errors->any())
                    <ul class="alert alert-danger p-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $guru['name'] }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $guru['email'] }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Ubah Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end">Edit</button>
                </div>
            </form>
        </div>
    </div>
    <!--  -->
@endsection