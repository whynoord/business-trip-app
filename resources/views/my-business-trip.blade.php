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
                    @foreach ($bustrips as $bustrip)
                        <tr>
                            <td style="width: 3%">{{ $loop->iteration }}</td>
                            <td style="width: 21%">{{ $bustrip->city1->name }} &#8594; {{ $bustrip->city2->name }}</td>
                            <td style="width: 25%">{{ date('d', strtotime($bustrip->departure_date)) . ' ' . substr(date('F', strtotime($bustrip->departure_date)), 0, 3) }}
                                &#8594;
                                {{ date('d', strtotime($bustrip->return_date)) . ' ' . substr(date('F', strtotime($bustrip->tanggal_akhir)), 0, 3) . ' ' .  date('Y', strtotime($bustrip->return_date))}}
                                ({{ $bustrip->days }} days)
                            </td>
                            <td style="width: 40%" class="text-start">{{ $bustrip->description }}</td>
                            <td style="width: 12%">
                                <div data-status="{{ $bustrip->status }}" class="rounded-pill p-1">
                                    {{ $bustrip->status }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('modal.add-business-trip')
@endsection
