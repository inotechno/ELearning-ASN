<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">Register Participant - Step {{ $step }}</h4>
                        <a href="{{ route('register.teacher') }}" class="text-primary">Register for
                            Teacher</a>
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
                                                <label for="nip">NIP</label>
                                                <input type="text"
                                                class="form-control @error('nip') is-invalid @enderror"
                                                placeholder="Enter Your NIP" wire:model='nip'>

                                                @error('nip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Front Title</label>
                                                <input type="text"
                                                    class="form-control @error('front_title') is-invalid @enderror"
                                                    placeholder="Enter Your Front Title" wire:model='front_title'>

                                                @error('front_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>Back Title</label>
                                                <input type="text"
                                                    class="form-control @error('back_title') is-invalid @enderror"
                                                    placeholder="Enter Your Back Title" wire:model='back_title'>

                                                @error('back_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label>Birth Place</label>
                                                <input type="text"
                                                    class="form-control @error('birth_place') is-invalid @enderror"
                                                    placeholder="Enter Your Birth Place" wire:model='birth_place'>

                                                @error('birth_place')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label>Birth Date</label>
                                                <input type="date"
                                                    class="form-control @error('birth_date') is-invalid @enderror"
                                                    placeholder="Enter Your Birth Date" wire:model='birth_date'>

                                                @error('birth_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
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
                                        <div class="col-lg-3">
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
                                    </div>
                                </section>
                            @endif

                            @if ($step === 3)
                                <h3>Data Kepegawaian</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input"> Institute ID</label>
                                                <select wire:model='institution_id'
                                                    class="form-control @error('institution_id') is-invalid @enderror">
                                                    <option value="">Select Institution</option>
                                                    @foreach ($institutions as $institution)
                                                        <option value="{{ $institution->id }}">
                                                            {{ $institution->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('institution_id')
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

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input">Rank ID</label>
                                                <select wire:model='rank_id'
                                                    class="form-control @error('rank_id') is-invalid @enderror">
                                                    <option value="">Select for Rank</option>
                                                    @foreach ($ranks as $rank)
                                                        <option value="{{ $rank->id }}">{{ $rank->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('rank_id')
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
                                                <label for="basicpill-vatno-input">Position Name</label>
                                                <input type="text"
                                                    class="form-control @error('position') is-invalid @enderror"
                                                    placeholder="Enter Your Position Name" wire:model='position'>

                                                @error('position')
                                                    <span class="invalid-feedback" role="alert">
                                                        <span>{{ $message }}</span>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input">Unit Name</label>
                                                <input type="text"
                                                    class="form-control @error('unit_name') is-invalid @enderror"
                                                    placeholder="Enter Your Unit Name" wire:model='unit_name'>

                                                @error('unit_name')
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

                            @if ($step < 3)
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
