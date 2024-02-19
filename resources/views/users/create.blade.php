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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card border border-secondary mt-3 p-3">
                    <form method="POST" action="/users" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control border border-secondary"
                                id="name">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                                <span>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control border border-secondary" id="email"
                                placeholder="Enter email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                        <label>Role</label>
                        <select class="form-select border border-secondary" name="role">
                            <option selected>Select role</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                       </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control border border-secondary"
                                id="password" placeholder="Password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
