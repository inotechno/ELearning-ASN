<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h4 class="card-title">Course</h4>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Thumbnail <small class="text-danger"> * Field Required </small></label>
                        <input type="file" class="form-control @error('img_thumbnail') is-invalid @enderror"
                            wire:model="img_thumbnail" placeholder="Enter Your Thumbnail">

                        @if ($previewThumbnail)
                            <img src="{{ $previewThumbnail }}" class="img-thumbnail mt-2" style="max-height: 500px;">
                        @endif

                        @error('img_thumbnail')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Title <small class="text-danger"> * Field Required </small></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            wire:model="title" placeholder="Enter Your Title">

                        @error('title')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description Short <small class="text-danger"> * Field Required </small></label>
                        <textarea class="form-control @error('description_short') is-invalid @enderror" wire:model="description_short"
                            cols="30" rows="10"></textarea>

                        @error('description_short')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description <small class="text-danger"> * Field Required </small></label>

                        @livewire('livewire-quill', [
                            'quillId' => 'description',
                            'data' => $description,
                            'classes' => 'bg-white',
                            'toolbar' => [
                                [
                                    [
                                        'header' => [1, 2, 3, 4, 5, 6, false],
                                    ],
                                ],
                                ['bold', 'italic', 'underline'],
                                [
                                    [
                                        'list' => 'ordered',
                                    ],
                                    [
                                        'list' => 'bullet',
                                    ],
                                ],
                                ['link'],
                                ['image'],
                            ],
                        ])

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label>Implementation Date <small class="text-danger"> * Field Required </small></label>

                        <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd"
                            data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input type="text"
                                class="form-control @error('implementation_start') is-invalid @enderror"
                                wire:model="implementation_start" placeholder="Start Date" id="implementation_start" />
                            <input type="text" class="form-control @error('implementation_end') is-invalid @enderror"
                                wire:model="implementation_end" placeholder="End Date" id="implementation_end" />
                        </div>

                        @error('implementation_start')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror

                        @error('implementation_end')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Course Topics</h4>
                    @livewire('course-topic.course-topic-create', ['courseId' => $courseId])
                </div>
            </div>
        </div>

        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Data Relationship</h4>
                    <div class="mb-3">
                        <label class="form-label">Category <small class="text-danger"> * Field Required </small></label>
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="category_id"
                                            wire:model="category_id" id="category-{{ $category->id }}"
                                            value="{{ $category->id }}">
                                        <label class="form-check-label" for="category-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type <small class="text-danger"> * Field Required </small></label>
                        <div class="row">
                            @foreach ($types as $type)
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="type_id"
                                            wire:model="type_id" id="type-{{ $type->id }}"
                                            value="{{ $type->id }}">
                                        <label class="form-check-label" for="type-{{ $type->id }}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @hasrole('administrator')
                        <div class="mb-3">
                            <label for="form-label">Teacher <small class="text-danger"> * Field Required </small></label>
                            <select class="form-control @error('teacher_id') is-invalid @enderror" id="select-teacher"
                                wire:model="teacher_id" aria-label="Default select example">
                                <option selected value="">Select for teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                @endforeach
                            </select>

                            @error('teacher_id')
                                <div class="invalid-feedback">
                                    <span role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    @endhasrole
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" wire:click.prevent="update()" wire:loading.attr="disabled"
                    wire:target="update" class="btn btn-primary w-md">Update</button>
            </div>
        </div>

    </div>

    @push('css')
        <link href="{{ asset('libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet"
            type="text/css">

        {{-- <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    @endpush

    @push('plugin')
        <script src="{{ asset('libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>


        {{-- <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script> --}}
    @endpush

    @script
        <script>
            $('#implementation_start').on('change', function() {
                $wire.set('implementation_start', $(this).val());
            });

            $('#implementation_end').on('change', function() {
                $wire.set('implementation_end', $(this).val());
            });
        </script>
    @endscript
</div>
