@extends('layouts.app')

@section('content')
    <div class="container main-content">
        <h5>Business Trip Submission</h5>
        <div class="wrapper rounded p-3">
            <form action="" method="GET">
                @csrf
                <ul class="list-group list-group-horizontal mb-3">
                    <li class="list-group-item">
                        <a href="" class="text-decoration-none">New Submission
                            (1)</a>
                    </li>
                    <li class="list-group-item">
                        <a href="" class="text-decoration-none">Submission History</a>
                    </li>
                </ul>
            </form>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 12%">Name</th>
                        <th style="width: 17%" class="text-center">City</th>
                        <th style="width: 24%" class="text-center">Date</th>
                        <th style="width: 37%">Description</th>
                        <th style="width: 7%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Matteo Kadafi</td>
                        <td class="text-center">Jogja &#8594;
                            Bandung</td>
                        <td class="text-center">
                            1 Jan
                            &#8594;
                            2 Jan 2023
                            (2 days)
                        </td>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td>
                            <button type="button" id="btn-approval" class="btn btn-transparent text-primary"
                                data-bs-toggle="modal" data-bs-target="#approval"><i class="bi bi-eye-fill"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
    @include('modal.approval')
@endsection
