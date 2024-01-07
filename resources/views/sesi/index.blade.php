@extends('layouts.login')

@section('konten')
 <div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Login</h1>
    <form action="guru/login" method="POST">
        @csrf 
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="Password" name="Password" class="form-control">
    </form>
 </div>
 <div class="mb-3 d-grif">
    <button name="submit" type="submit" class="btn btn-primary">login</button>
 </div>