<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">Register Teacher - Step {{ $step }}</h4>
                        <a href="{{ route('register.teacher') }}" class="text-primary">Register for
                            Participant</a>
                    </div>
                    <form wire:submit.prevent="store">
                        <div id="register">

                            @if ($step === 1)
                                <!-- Seller Details -->
                                <h3>User Account</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">First name</label>
                                                <input type="text"
                                                    class="form-control @error('front_name') is-invalid @enderror"
                                                    placeholder="Enter Your First Name" wire:model='front_name'>

                                                @error('front_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-lastname-input">Last name</label>
                                                <input type="text"
                                                    class="form-control @error('back_name') is-invalid @enderror"
                                                    placeholder="Enter Your Last Name" wire:model='back_name'>

                                                @error('back_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Username</label>
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    placeholder="Enter Your Username" wire:model='username'>

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Enter Your Email ID" wire:model='email'>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Enter Your Password" wire:model='password'>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>Password Confirmation</label>
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    placeholder="Enter Your Password Confirmation"
                                                    wire:model='password_confirmation'>

                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                            @if ($step === 2)
                                <!-- Company Document -->
                                <h3>Data Pribadi</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>NIK</label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    placeholder="Enter Your NIK" wire:model='nik'>

                                                @error('nik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Phone</label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Enter Your Phone" wire:model='phone'>

                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="gender">Gender</label>
                                                <select wire:model='gender'
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">Select for Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>

                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>City</label>
                                                <input type="text"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    placeholder="Enter Your City" wire:model='city'>

                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Country</label>
                                                <input type="text"
                                                    class="form-control @error('country') is-invalid @enderror"
                                                    placeholder="Enter Your Country" wire:model='country'
                                                    value="Indonesia" readonly>

                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input">Education ID</label>
                                                <select wire:model='education_id'
                                                    class="form-control @error('education_id') is-invalid @enderror">
                                                    <option value="">Select for Education</option>
                                                    @foreach ($educations as $education)
                                                        <option value="{{ $education->id }}">{{ $education->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('education_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            @endif
                        </div>

                        <div class="mt-4">
                            @if ($step > 1)
                                <button type="button" class="btn btn-primary"
                                    wire:click="decreaseStep">Previous</button>
                            @endif

                            @if ($step < 2)
                                <button type="button" class="btn btn-primary float-end"
                                    wire:click="increaseStep">Next</button>
                            @else
                                <button type="submit" class="btn btn-success float-end">Submit</button>
                            @endif
                        </div>
                    </form>

                </div>
                <!-- end card body -->
            </div>

            <div class="mt-5 text-center">

                <div>
                    <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary">
                            Login</a>
                    </p>
                    <p>©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> LMS ASN. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                        Inotechno
                    </p>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    @push('plugin')
    @endpush
</div>