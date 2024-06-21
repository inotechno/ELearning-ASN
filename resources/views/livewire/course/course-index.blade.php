<div>
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-6">
                        <div class="card p-1 border shadow-none">
                            <div class="p-3">
                                <h5><a href="blog-details.html" class="text-dark">{{ $course->title }}</a></h5>
                                <p class="text-muted mb-0">{{ $course->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="position-relative">
                                <img src="{{ asset('images/small/img-2.jpg') }}" alt="" class="img-thumbnail">
                            </div>

                            <div class="p-3">
                                <ul class="list-inline">
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                            Project
                                        </a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-comment-dots align-middle text-muted me-1"></i>
                                            12 Comments
                                        </a>
                                    </li>
                                </ul>
                                <p>{{ $course->description_short }}</p>

                                <div>
                                    <a href="javascript: void(0);" class="text-primary">Read
                                        more <i class="mdi mdi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('course.create') }}" class="btn btn-primary w-100">Create a new course</a>
                    </div>
                    <hr class="my-4">

                    <div class="search-box">
                        <p class="text-muted">Search</p>
                        <div class="position-relative">
                            <input type="text" class="form-control rounded bg-light border-light"
                                placeholder="Search..." wire:model="search">
                            <i class="mdi mdi-magnify search-icon"></i>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div>
                        <p class="text-muted">Categories</p>

                        <ul class="list-unstyled fw-medium">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                            class="mdi mdi-chevron-right me-1"></i> {{ $category->name }} <span
                                            class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">{{ $category->courses->count() }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <hr class="my-4">

                    <div>
                        <p class="text-muted">Type of Courses</p>

                        <ul class="list-unstyled fw-medium">
                            @foreach ($types as $type)
                                <li>
                                    <a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                            class="mdi mdi-chevron-right me-1"></i> {{ $type->name }} <span
                                            class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">{{ $type->courses->count() }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

    @push('plugin')
        <!-- apexcharts -->
        <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
    @endpush
</div>
