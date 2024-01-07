@extends('layouts.template')

@section('content')
    <form action="{{ route('klasifikasi-surat.update', $surat->id) }}" method="POST" class="card p-5">
        @csrf
        @method('patch')
        @if(Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success')}}</div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <h3>Edit Data Klasifikasi Surat</h3><br>
        <div class="ms-3 row">
            <label for="number" class="col-sm-2 col-form-label">Kode Surat</label>
            <div class="col-sm-10">
                <input value="{{ $surat->letter_code }}" type="number" class="form-control" id="number" name="letter_code" value="{{ old ('number')}}">
            </div>
        </div>
        <br>
        <div class="ms-3 row">
            <label for="string" class="col-sm-2 col-form-label">Klasifikasi Surat</label>
            <div class="col-sm-10">
                <input value=" {{ $surat->name_type }}" type="string" class="form-control" id="string" name="name_type" value="{{ old ('string')}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
    @endsection