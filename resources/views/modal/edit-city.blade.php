

<div class="modal fade" id="editCity-{{ $city->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit City</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <form method="post" action="{{ route('updateCity', $city->id) }}">
      
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" value="{{ old('name', $city->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude" value="{{ old('latitude', $city->latitude) }}">
                          </div>
                          <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude" value="{{ old('longitude', $city->longitude) }}">
                          </div>
                          <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control" name="province" value="{{ old('province', $city->province) }}">
                          </div>
                          <div class="mb-3">
                            <label for="island" class="form-label">Island</label>
                            <input type="text" class="form-control" name="island" value="{{ old('island', $city->island) }}">
                          </div>
                          <div class="mb-3">
                            <label for="oversea" class="form-label">Oversea</label>
                            <select name="oversea" class="form-select">
                                <option value="no" {{ old('oversea', $city->oversea) == 'no' ? 'selected' : ''}}>No</option>
                                <option value="yes" {{ old('oversea', $city->oversea) == 'yes' ? 'selected' : ''}}>Yes</option>
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