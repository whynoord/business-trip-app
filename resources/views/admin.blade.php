@extends('layouts.admin')

@section('content')
<div class="container main-content">
    <h5>Users List</h5>
    <div class="wrapper rounded p-3">
        <div class="container-fluid d-flex p-0">
            <div class="ms-auto mb-3">
                <button type="button" class="btn btn-transparent border-primary text-primary py-2 px-3"
                    data-bs-toggle="modal" data-bs-target="#addUser">+ Add User</button>
            </div>
        </div>
        <table class="table text-center">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editUser-{{ $user->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href=""><i class="bi bi-x-square-fill"></i></a>
                    </td>
                </tr>
                @include('modal.edit-user')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('modal.add-user')
@endsection
