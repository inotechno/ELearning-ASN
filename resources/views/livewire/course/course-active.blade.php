<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <div class="card p-1 border shadow-none">
                            <div class="p-3">
                                <h5><a href="{{ route('course.show', $course->slug) }}"
                                        class="text-dark">{{ $course->title }}</a></h5>
                                <p class="text-muted mb-0">{{ $course->created_at->diffForHumans() }}</p>
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
                                
                                <p>{{ $course->description_short }}</p>

                                <div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('course.show', $course->slug) }}" class="text-primary">Read
                                            more <i class="mdi mdi-arrow-right"></i></a>

                                        @hasrole('teacher')
                                            <div class="ms-auto">
                                                <a href="{{ route('course.activity', $course->slug) }}"
                                                    class="btn btn-sm btn-soft-warning">Detail Activity <i
                                                        class="mdi mdi-eye"></i></a>
                                            </div>
                                        @endhasrole
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
