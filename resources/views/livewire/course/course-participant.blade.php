<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <div class="card p-1 border shadow-none">
                            <div class="p-3">
                                <h5><a href="{{ route('courses.my-course.progress', $course->slug) }}"
                                        class="text-dark">{{ $course->title }}</a></h5>
                                <p class="text-muted mb-0">Tanggal Pelaksanaan : {{ $course->implementation_start->format('d M Y') }} - {{ $course->implementation_end->format('d M Y') }}</p>
                            </div>

                            <div class="position-relative">
                                <img src="{{ $course->img_thumbnail ?? asset('images/small/img-2.jpg') }}"
                                    alt="" class="img-thumbnail">
                            </div>

                            <div class="p-3">
                                <ul class="list-inline">
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                            {{ $course->category->name }}
                                        </a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="javascript: void(0);" class="text-muted">
                                            <i class="bx bx-comment-dots align-middle text-muted me-1"></i>
                                            {{ $course->topics->count() }} Topics
                                        </a>
                                    </li>
                                </ul>
                                
                                <div class="mb-4">
                                    <div class="progress progress-xl animated-progess">
                                        <div class="progress-bar " role="progressbar" style="width: {{ $course->total_progress }}%;" aria-valuenow="{{ $course->total_progress }}" aria-valuemin="0" aria-valuemax="100">{{ $course->total_progress }}%</div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('courses.my-course.progress', $course->slug) }}" class="text-primary">Continue <i class="mdi mdi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</div>