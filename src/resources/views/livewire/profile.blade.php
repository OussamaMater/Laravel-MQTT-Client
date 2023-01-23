<div class="row mt-3">
    <div class="col-12 col-xl-8 h-100">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <div class="row mb-3">
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="phone">Name</label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('name')]) wire:model="name" type="text" placeholder="John Doe">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('email')]) wire:model="email" type="email"
                            placeholder="name@company.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label>Password</label>
                        <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) wire:model="password"
                            placeholder="Must have at least 8 characters">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label>Password Confirmation</label>
                        <input type="password" @class([
                            'form-control',
                            'is-invalid' => $errors->has('password_confirmation'),
                        ]) wire:model="password_confirmation"
                            placeholder="Confirm your password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-gray-800 mt-2 animate-up-2" wire:click="updateProfile">
                    Save
                </button>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4 h-100">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top bg-primary"></div>
                    <div class="card-body pb-2">
                        <img src="{{ Vite::asset('resources/images/default_avatar.png') }}"
                            class="avatar-xl rounded-circle mx-auto mt-n7 mb-4">
                        <h4 class="h3">
                            {{ empty($name) ? Auth::user()->name : $name }}
                            <span @class([
                                'badge',
                                'bg-warning' => !auth()->user()->email_verified_at,
                                'bg-success' => auth()->user()->email_verified_at,
                            ])>
                                {{ is_null(auth()->user()->email_verified_at) ? 'Unverified' : 'Verified' }}
                            </span>
                        </h4>
                        <h5 class="fw-normal">{{ empty($email) ? Auth::user()->email : $email }}</h5>
                        <p class="text-gray mb-4">
                            last updated:
                            {{ Auth::user()->updated_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('settings')
        <script>
            window.addEventListener('profile-updated', event => {
                Swal.fire({
                    title: event.detail.msg,
                    icon: 'success',
                    showCancelButton: false,
                    showConfirmButton: false
                });
            });
        </script>
    @endpush
</div>
