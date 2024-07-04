<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h3 class="text-primary"> Reset Password</h3>
                                <p>Atur Ulang Kata Sandi dengan {{ config('app.name') }}.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('images/asn5.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <a href="javascript:void(0)">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="{{ asset('images/logo-light.svg') }}" alt=""
                                        class="rounded-circle" height="34">
                                </span>
                            </div>
                        </a>
                    </div>

                    <div class="p-2">
                        <form class="form-horizontal" wire:submit.prevent="submit">

                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="useremail" wire:model="email" placeholder="Enter email">
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light"
                                    type="submit" wire:loading.attr="disabled" wire:target="submit">Reset</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">
                <p>Ingat Password? <a href="{{ route('login') }}" class="fw-medium text-primary"> Sign In here</a> </p>
                <p>©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> LMS ASN. Crafted with <i class="mdi mdi-heart text-danger"></i> by Agoeng
                </p>
            </div>
        </div>
    </div>
</div>
