<div class="modal fade" id="approval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Business Trip Submission Approval</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" action="">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <input type="hidden" class="form-control" id="idbustrip" name="idbustrip" readonly>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" disabled>
                                </div>
                                <label for="input_kota" class="form-label">City</label>
                                <div class="input-group input_kota mb-3">
                                    <input type="text" class="form-control" id="origin_city" disabled>
                                    <span class="input-group-text">&#8594;</span>
                                    <input type="text" class="form-control" id="destionation_city" disabled>
                                </div>
                                <label for="input_city" class="form-label">Date</label>
                                <div class="input-group input_kota mb-3">
                                    <input type="date" class="form-control" id="departure_date" disabled>
                                    <span class="input-group-text">&#8594;</span>
                                    <input type="date" class="form-control" id="return_date" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" rows="2" name="description" id="description" disabled></textarea>
                                </div>
                            </div>
                        </div>

                        <table class="table text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>Total Days</th>
                                    <th>Distance</th>
                                    <th>Allowance</th>
                                </tr>
                            </thead>
                            <tbody class="table-secondary">
                                <tr>
                                    <td id="day"></td>
                                    <td><span id="distance"></span> km</td>
                                    <td>Rp<span id="allowance"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <button type="submit" name="action" value="reject"
                                        class="btn btn-danger">Reject</button>
                                    <button type="submit" name="action" value="approve"
                                        class="btn btn-primary">Approve</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
