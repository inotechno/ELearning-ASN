<div>
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-6">
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

                                        @hasrole('administrator')
                                            <div class="ms-auto">
                                                <a href="javascript: void(0);" class="btn btn-sm btn-soft-danger"
                                                    wire:click="destroy({{ $course->id }})">Delete <i
                                                        class="mdi mdi-trash-can"></i></a>
                                                <a href="{{ route('course.edit', $course->slug) }}"
                                                    class="btn btn-sm btn-soft-warning">Edit <i
                                                        class="mdi mdi-pencil"></i></a>
                                            </div>
                                        @endhasrole

                                        @hasrole('teacher')
                                            <div class="ms-auto">
                                                <a href="javascript: void(0);" wire:click="getCourse({{ $course->id }})"
                                                    class="btn btn-sm btn-soft-warning">Upload Materi <i
                                                        class="mdi mdi-pencil"></i></a>
                                            </div>
                                        @endhasrole
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $courses->links('livewire.component.pagination') }}

        </div>

        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-body p-4">
                    @hasrole('administrator')
                        <div class="d-flex align-items-center">
                            <a href="{{ route('course.create') }}" class="btn btn-primary w-100">Create a new course</a>
                        </div>

                        <hr class="my-4">
                    @endhasrole
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
                                    <a href="javascript: void(0);"
                                        wire:click="$set('category_id', {{ $category->id }})"
                                        class="@if ($category_id != $category->id) text-muted @endif py-2 d-block"><i
                                            class="mdi mdi-chevron-right me-1"></i> {{ $category->name }} <span
                                            class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">{{ $category->activeCoursesCount() }}</span></a>
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
                                    <a href="javascript: void(0);" wire:click="$set('type_id', {{ $type->id }})"
                                        class="@if ($type_id != $type->id) text-muted @endif py-2 d-block"><i
                                            class="mdi mdi-chevron-right me-1"></i> {{ $type->name }} <span
                                            class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">{{ $type->activeCoursesCount() }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex align-items-center">
                        <a href="javascript:void()" class="btn btn-primary w-100" wire:click="resetFilter">Reset
                            Filter</a>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

    {{-- Buatkan Modal Disini Pakai Div --}}
    <div class="modal fade" id="uploadMateriModal" data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadMateriModalLabel">Create Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="course_topic_id" class="form-label">Course Topic</label>
                        <select wire:model="course_topic_id" class="form-select" id="">
                            <option value="">Select Course Topic</option>
                            @if ($topics)
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('course_topic_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" wire:model="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="materi" class="form-label">Upload Materi</label>
                        <input type="file" class="form-control" id="materi" wire:model="materi">
                        @error('materi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="uploadMateri">Save</button>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('openModal', () => {
                $('#uploadMateriModal').modal('show');
            })

            $wire.on('closeModal', () => {
                $('#uploadMateriModal').modal('hide');
            })
        </script>
    @endscript
</div>
