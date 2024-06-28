<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#user-account" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">User Account</span>
                            </a>
                        </li>
                        
                        @hasrole('participant|teacher')
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#personal-data" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Personal Data</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#personnel-data" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">Personnel Data</span>
                                </a>
                            </li>
                        @endhasrole
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="user-account" role="tabpanel">
                            @livewire('profile.user-account', key('user-account'))
                        </div>

                        @hasrole('participant|teacher')
                            <div class="tab-pane" id="personal-data" role="tabpanel">
                                @livewire('profile.personal-data', key('personal-data'))
                            </div>
                            <div class="tab-pane" id="personnel-data" role="tabpanel">
                                @livewire('profile.personnel-data', key('personnel-data'))
                            </div>
                        @endhasrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
