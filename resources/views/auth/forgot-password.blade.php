<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Forgot Password?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('password-email') }}" method="post">
                @csrf
                <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errors )
                                <li>{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        $(document).ready(function(){
                            $('#formModal').modal('show');
                        });
                    </script>
                @endif

                <small><p class="text-center m-0">Please enter your email to reset the password</p></small>
                <!-- Email input -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" 
                        value="{{ old('email') }}" placeholder="email" autofocus required/>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    <button type="submit" name="submit" class="btn btn-primary">Request Password Reset</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>