

<div class="modal fade" id="addCity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add City</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <form method="post" action="{{ route('storeCity') }}">
      
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude">
                          </div>
                          <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude">
                          </div>
                          <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control" name="province">
                          </div>
                          <div class="mb-3">
                            <label for="island" class="form-label">Island</label>
                            <input type="text" class="form-control" name="island">
                          </div>
                          <div class="mb-3">
                            <label for="oversea" class="form-label">Oversea</label>
                            <select name="oversea" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>