<div class="modal fade" id="editUser-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <form method="post" action="{{ route('updateUser', $user->id) }}">

                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-select">
                                        <option value="employee"
                                            {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>Employee
                                        </option>
                                        <option value="hrd"
                                            {{ old('role', $user->role) == 'hrd' ? 'selected' : '' }}>HRD</option>
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
