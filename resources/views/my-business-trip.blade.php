@extends('layouts.app')

@section('content')
    <div class="container main-content">
        <h5>My Business Trip</h5>
        <div class="wrapper rounded p-3">
            <div class="container-fluid d-flex p-0">
                <div class="ms-auto mb-3">
                    <button type="button" class="btn btn-transparent border-primary text-primary py-2 px-3"
                        data-bs-toggle="modal" data-bs-target="#addBusinessTrip">+ Add Business Trip</button>
                </div>
            </div>
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>City</th>
                        <th>Date</th>
                        <th class="text-start">Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 3%">1</td>
                        <td style="width: 21%">Bandung &#8594; Jogja</td>
                        <td style="width: 25%">1 Jan &#8594; 2 Jan 2023 (2 days)</td>
                        <td style="width: 40%" class="text-start">Lorem ipsum dolor sit amet</td>
                        <td style="width: 12%">
                            <div data-status="approved" class="rounded-pill p-1">
                                Approved
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    @include('modal.add-business-trip')
@endsection
