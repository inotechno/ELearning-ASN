<div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">

                <div class="card-body border-bottom">
                    <div class="row g-2">
                        <div class="col-xxl-3 col-lg-6">
                            <input type="search" class="form-control" id="searchInput" placeholder="Search for ..."
                                wire:model="search">
                        </div>
                        <div class="col-xxl-1 col-lg-6">
                            <select class="form-control select2">
                                <option>Type Topic</option>
                                @foreach ($type_topics as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <select class="form-control select2">
                                <option>Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="mb-4">
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd"
                                    data-date-autoclose="true" data-provide="datepicker"
                                    data-date-container='#datepicker6'>
                                    <input type="text" class="form-control @error('start_date') is-invalid @enderror"
                                        wire:model="start_date" placeholder="Start Date" id="start_date" />
                                    <input type="text" class="form-control @error('end_date') is-invalid @enderror"
                                        wire:model="end_date" placeholder="End Date" id="end_date" />
                                </div>

                                @error('start_date')
                                    <div class="invalid-feedback">
                                        <span role="alert">{{ $message }}</span>
                                    </div>
                                @enderror

                                @error('end_date')
                                    <div class="invalid-feedback">
                                        <span role="alert">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-2 col-lg-3">
                            <button type="button" class="btn btn-soft-secondary w-100"><i
                                    class="mdi mdi-filter-outline align-middle"></i> Filter</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Participant Name</th>
                                    <th scope="col">Education ID</th>
                                    <th scope="col">Institution ID</th>
                                    <th scope="col">Rank ID</th>
                                    <th scope="col">Course Title</th>
                                    <th scope="col">Course Topic</th>
                                    <th scope="col">Date Activity</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course_activities as $key => $course_activity)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>
                                            {{ $course_activity->participant ? $course_activity->participant->front_name : '' }}
                                            {{ $course_activity->participant ? $course_activity->participant->back_name : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant->education ? $course_activity->participant->education->name : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant->institution ? $course_activity->participant->institution->name : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant->rank ? $course_activity->participant->rank->name : '' }}
                                        </td>
                                        <td>{{ $course_activity->course->title }}</td>
                                        <td>{{ $course_activity->courseTopic->title }}</td>
                                        <td>{{ $course_activity->created_at->format('d M, Y h:i') }}</td>
                                        {{-- <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i
                                                            class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i
                                                            class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal"
                                                        class="btn btn-sm btn-soft-danger"><i
                                                            class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        {{ $course_activities->links() }}
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div><!--end card-->
        </div><!--end col-->

        @livewire('component.course-activity-percentage', ['course_id' => $courseId])
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
            $('#start_date').on('change', function() {
                $wire.set('start_date', $(this).val());
            });

            $('#end_date').on('change', function() {
                $wire.set('end_date', $(this).val());
            });
        </script>
    @endscript
</div>
