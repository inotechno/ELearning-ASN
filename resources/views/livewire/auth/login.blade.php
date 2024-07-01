<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Sign in to continue to Skote.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="auth-logo">
                        <a href="javascript:void();" class="auth-logo-light">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="{{ asset('images/logo-light.svg') }}" alt=""
                                        class="rounded-circle" height="34">
                                </span>
                            </div>
                        </a>

                        <a href="javascript:void();" class="auth-logo-dark">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="{{ asset('images/logo.svg') }}" alt="" class="rounded-circle"
                                        height="34">
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        <form class="form-horizontal" wire:submit.prevent="login">

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" placeholder="Enter username" wire:model="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        wire:model="password" placeholder="Enter password" aria-label="Password"
                                        aria-describedby="password-addon">
                                    <button class="btn btn-light " type="button" id="password-addon"><i
                                            class="mdi mdi-eye-outline"></i></button>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-check"
                                    wire:model="remember">
                                <label class="form-check-label" for="remember-check">
                                    Remember me
                                </label>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="{{ route('forgot-password') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i>
                                    Lupa Password?</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>Belum Punya Akun ? <a href="{{ route('register') }}" class="fw-medium text-primary">
                            Daftar Sekarang </a> </p>
                    <p>©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> LMS ASN. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                        Inotechno
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
