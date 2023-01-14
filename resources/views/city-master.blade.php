@extends('layouts.app')

@section('content')
    <div class="container main-content">
        <h5>City Master</h5>
        <div class="wrapper rounded p-3">
            <div class="container-fluid d-flex p-0">
                <div class="ms-auto mb-3">
                    <button type="button" class="btn btn-transparent border-primary text-primary py-2 px-3" data-bs-toggle="modal" data-bs-target="#addCity">+ Add City</button>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>City Name</th>
                        <th>Province</th>
                        <th>Island</th>
                        <th>Oversea</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bandung</td>
                        <td>Jawa Tengah</td>
                        <td>Jawa</td>
                        <td>No</td>
                        <td>123456</td>
                        <td>123456</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#editCity">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href=""><i class="bi bi-x-square-fill"></i></a>
                        </td>
                     </tr>
                     @include('modal.edit-city')

                </tbody>
            </table>
        </div>  
    </div>
    @include('modal.add-city')
@endsection