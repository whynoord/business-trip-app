<div class="modal fade" id="addBusinessTrip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Business Trip</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" action="{{route('storeBusinessTrip') }}">
                        @csrf
                        <div class="row d-flex justify-content-center">

                            <div class="col">
                                <label for="input_kota" class="form-label">City</label>
                                <div class="input-group input_kota mb-3">
                                    <select class="form-select" name="origin_city">
                                        <option>Select Origin</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-text">&#8594;</span>
                                    <select class="form-select" name="destination_city">
                                        <option>Select Destination</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="date" class="form-label">Date</label>
                                <div class="input-group date mb-3">
                                    <input type="text" class="form-control datepicker" placeholder="Departure date"
                                        name="departure_date" id="departure_date">
                                    <span class="input-group-text">&#8594;</span>
                                    <input type="text" class="form-control datepicker" placeholder="Return date"
                                        name="return_date" id="return_date">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                Business Trip Total
                                <br>
                                <span id="day"></span> days
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('.datepicker').datepicker();
        $('#day').text(0);
        $('#departure_date, #return_date').on('keyup change', function() {
            if ($('#return_date').val() !== '') {
                var departure_date = $('#departure_date').val();
                var return_date = $('#return_date').val();

                var startDate = new Date(departure_date);
                var endDate = new Date(return_date);

                var diff = endDate - startDate;
                var days = Math.floor(diff / (1000 * 60 * 60 * 24));

                $('#day').text(days);
            }
        });
    })
</script>
