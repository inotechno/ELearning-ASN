<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body" wire:ignore>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">All</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#participant" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Peserta</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#teacher" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Pengajar</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="all" role="tabpanel">
                            @livewire('user.user-all', key('user-all'))
                        </div>
                        <div class="tab-pane" id="participant" role="tabpanel">
                            @livewire('user.user-participant', key('user-participant'))
                        </div>
                        <div class="tab-pane" id="teacher" role="tabpanel">
                            @livewire('user.user-teacher', key('user-teacher'))
                        </div>
                    </div>

                </div>

            </div><!--end card-->
        </div><!--end col-->

    </div>
</div>
