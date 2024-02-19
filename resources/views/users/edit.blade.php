@extends('layouts/user-layout')

@section('main')
    <nav class="navbar navbar-expand-sm bg-dark">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/users">Users</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="edit-form">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="card border border-secondary mt-3 p-3">
                        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control border border-secondary"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control border border-secondary"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-select border border-secondary" name="role">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                                </select>
                            </div>
                            
                            <button type='submit' class='btn btn-primary'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
@endsection
