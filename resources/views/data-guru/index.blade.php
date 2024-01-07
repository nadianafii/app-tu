@extends('layouts.template')

@section('content')
<div class="card">
        <div class="card-body">
            <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah</a>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @php($number = 1)
                @foreach ($guru as $value)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->role }}</td>
                        <td>
                            <div class="d-flex gap-2 align-items-center">
                                <a href="{{ route('guru.edit', $value->id) }}"
                                   class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{  route('guru.delete', $value->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection