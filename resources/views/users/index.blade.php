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
        <div class="text-end">
            <a href="users/create" class="btn btn-dark mt-2">New User</a>
            <a href="{{ url('importExportView') }}" class="btn btn-dark mt-2">importExportView</a>
        </div>
        <div class="mt-4">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(function(){
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'role', name: 'role'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
  </script>
@endsection
