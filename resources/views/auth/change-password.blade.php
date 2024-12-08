<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('password.change') }}" method="post">
                @csrf
                <div class="modal-body">

                    @foreach (['current_password', 'new_password', 'repeat_password'] as $changePassword)
                    <div class="form-group">
                        <label for="password">
                            @if ($changePassword === 'current_password')
                                Current Password
                            @elseif ($changePassword === 'new_password')
                                New Password
                            @else
                                Confirm New Password
                            @endif
                        </label>
                        <input type="password" name="{{ $changePassword }}" id="password" class="form-control 
                            @error($changePassword) is-invalid @enderror" placeholder="password" autofocus required/>
                        @error($changePassword)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#formModal').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                    @endforeach

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>