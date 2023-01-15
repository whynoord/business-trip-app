@extends('layouts.app')

@section('content')
    <div class="container main-content">
        <h5>Business Trip Submission</h5>
        <div class="wrapper rounded p-3">
            <form action="{{ route('submission') }}" method="GET">
                @csrf
                <ul class="list-group list-group-horizontal mb-3">
                    <li class="list-group-item">
                        <a href="{{ route('submission') }}" class="text-decoration-none">New Submissions
                            ({{ $sum }})</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/business-trip-submission?history" class="text-decoration-none">Submission History</a>
                    </li>
                </ul>
            </form>

            @if ($request->has('history'))
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 3%">#</th>
                            <th style="width: 12%">Name</th>
                            <th style="width: 17%" class="text-center">City</th>
                            <th style="width: 24%" class="text-center">Dates</th>
                            <th style="width: 36%">Description</th>
                            <th style="width: 8%" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->user->name }}</td>
                                <td class="text-center">{{ $history->city1->name }} &#8594;
                                    {{ $history->city2->name }}</td>
                                <td class="text-center">
                                    {{ date('d', strtotime($history->departure_date)) . ' ' . substr(date('F', strtotime($history->departure_date)), 0, 3) }}
                                    &#8594;
                                    {{ date('d', strtotime($history->return_date)) . ' ' . substr(date('F', strtotime($history->return_date)), 0, 3) . ' ' .  date('Y', strtotime($history->return_date))}}
                                    ({{ $history->days }} days)
                                </td>
                                <td>{{ $history->description }}</td>
                                <td>{{ $history->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 3%">#</th>
                            <th style="width: 12%">Name</th>
                            <th style="width: 17%" class="text-center">City</th>
                            <th style="width: 24%" class="text-center">Dates</th>
                            <th style="width: 37%">Description</th>
                            <th style="width: 7%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $submission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $submission->user->name }}</td>
                                <td class="text-center">{{ $submission->city1->name }} &#8594;
                                    {{ $submission->city2->name }}</td>
                                <td class="text-center">
                                    {{ date('d', strtotime($submission->departure_date)) . ' ' . substr(date('F', strtotime($submission->departure_date)), 0, 3) }}
                                    &#8594;
                                    {{ date('d', strtotime($submission->return_date)) . ' ' . substr(date('F', strtotime($submission->return_date)), 0, 3) . ' ' .  date('Y', strtotime($submission->return_date))}}
                                    ({{ $submission->days }} days)
                                </td>
                                <td>{{ $submission->description }}</td>
                                <td>
                                    <button type="button" id="btn-approval" class="btn btn-transparent text-primary"
                                        data-bs-toggle="modal" data-bs-target="#approval"
                                        data-idbustrip="{{ $submission->id }}" data-name="{{ $submission->user->name }}"
                                        data-origin_city="{{ $submission->city1->name }}"
                                        data-destination_city="{{ $submission->city2->name }}"
                                        data-departure_date="{{ $submission->departure_date }}"
                                        data-return_date="{{ $submission->return_date }}"
                                        data-days="{{ $submission->days }}" data-description="{{ $submission->description }}"
                                        data-lat_origin_city="{{ $submission->city1->latitude }}"
                                        data-long_origin_city="{{ $submission->city1->longitude }}"
                                        data-lat_destination_city="{{ $submission->city2->latitude }}"
                                        data-long_destination_city="{{ $submission->city2->longitude }}"
                                        data-origin_island="{{ $submission->city1->island }}"
                                        data-island_tujuan="{{ $submission->city2->island }}"
                                        data-origin_province="{{ $submission->city1->province }}"
                                        data-destination_province="{{ $submission->city2->province }}"><i
                                            class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif


        </div>
    </div>
    @include('modal.approval')

    <script>
        $(document).on('click', '#btn-approval', function() {
            let name = $(this).data('name');
            let origin_city = $(this).data('origin_city');
            let destination_city = $(this).data('destination_city');
            let departure_date = $(this).data('departure_date');
            let return_date = $(this).data('return_date');
            let days = $(this).data('days');
            let description = $(this).data('description');
            let idbustrip = $(this).data('idbustrip');
            let lat_origin_city = $(this).data('lat_origin_city');
            let long_origin_city = $(this).data('long_origin_city');
            let lat_destination_city = $(this).data('lat_destination_city');
            let long_destination_city = $(this).data('long_destination_city');
            let province1 = $(this).data('origin_province');
            let province2 = $(this).data('destination_province');
            let island1 = $(this).data('origin_island');
            let island2 = $(this).data('island_tujuan');

            $('#name').val(name);
            $('#origin_city').val(origin_city);
            $('#destination_city').val(destination_city);
            $('#departure_date').val(departure_date);
            $('#return_date').val(return_date);
            $('#description').val(description);
            $('#idbustrip').val(idbustrip);
            $('#days').text(days + ' days');

            // Calculate the distance between two points using the Haversine formula
            function haversineDistance(lat1, lon1, lat2, lon2) {
                var R = 6371; // radius of Earth in km
                var dLat = toRad(lat2 - lat1);
                var dLon = toRad(lon2 - lon1);
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;
                return d;
            }

            // Convert degrees to radians
            function toRad(degrees) {
                return degrees * Math.PI / 180;
            }

            var distance = haversineDistance(lat_origin_city, long_origin_city, lat_destination_city, long_destination_city)
                .toFixed(0);
            $('#distance').text(distance);

            var allowance = 0;
            if (distance >= 60) {
                switch (true) {
                    case province1 == province2:
                        allowance = 200000 * days;
                        break;

                    case province1 !== province2 && island1 == island2:
                        allowance = 250000 * days;
                        break;

                    default:
                        allowance = 300000 * days;
                        break;
                }
            } else {
                allowance = 0;
            }
            $('#allowance').text(allowance.toLocaleString('en-US', {
                useGrouping: true
            }));

        });
    </script>
@endsection
