<div class="modal fade" id="registerModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        style="width: 370px; margin-top:5.7%; margin-right:10%;">
        <div class="modal-content">
            <div class="modal-header position-relative justify-content-center align-items-center border-0"
                style="height: 80px;">
                <!-- Centered Icon -->
                <div class="position-absolute top-50 start-50 translate-middle">
                    <i id="registerKeyholeIcon" class="fas fa-lock icon locked"></i>
                </div>
            </div>
            <div class="text-center">
                <h1 class="h5 fw-bold">Register Now</h1>
            </div>

            <div class="modal-body pt-0" style="scroll-behavior: smooth; scrollbar-width: thin;">
                <!-- REGISTER FORM -->
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="register_name" class="fw-bold" :value="__('Name')" />
                        <x-text-input id="register_name" class="form-control" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="text-danger mt-1" />
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <x-input-label for="register_email" class="fw-bold" :value="__('Email')" />
                        <x-text-input id="register_email" class="form-control" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <x-input-label for="register_phone" class="fw-bold" :value="__('Phone')" />
                        <x-text-input id="register_phone" class="form-control" type="tel" name="phone"
                            :value="old('phone')" pattern="[0-9]*" required autocomplete="tel" />
                        <x-input-error :messages="$errors->get('phone')" class="text-danger mt-1" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="register_password" class="fw-bold" :value="__('Password')" />
                        <x-text-input id="register_password" class="form-control" type="password" name="password"
                            required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="register_password_confirmation" class="fw-bold" :value="__('Confirm Password')" />
                        <x-text-input id="register_password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-1" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input class="form-check-input border border-1 border-dark p-1" type="checkbox" name="remember"
                            id="register_remember_me">
                        <label class="form-check-label fw-bold" for="register_remember_me">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Actions -->
                    <div>
                        <a class="text-decoration-underline fw-bold small text-secondary hover:text-dark"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-outline-success">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function() {
        const icon = document.getElementById('registerKeyholeIcon');
        if (icon.classList.contains('fa-lock')) {
            icon.classList.remove('fa-lock', 'locked');
            icon.classList.add('fa-unlock', 'unlocked');
        } else {
            icon.classList.remove('fa-unlock', 'unlocked');
            icon.classList.add('fa-lock', 'locked');
        }
    });
</script>
