<div>

    <div class="row d-flex flex-wrap">
        @foreach ($course_topics as $topic)
            <div class="col-md">
                <a href="#" wire:click.prevent="getCourseActivity({{ $topic->id }})" class="text-decoration-none">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">
                                        {{ $topic->title }}
                                    </p>
                                    <h4 class="mb-0">{{ $topic->activities->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="card">

                <div class="card-body border-bottom">
                    <div class="row g-2">
                        <div class="col-xxl-3 col-lg-6">
                            <input type="search" class="form-control" id="searchInput" placeholder="Search for ..."
                                wire:model.live="search">
                        </div>
                        <div class="col-xxl-1 col-lg-6">
                            <select class="form-control select2" wire:model.live="type_topic_id">
                                <option>Type Topic</option>
                                @foreach ($type_topics as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xxl-3 col-lg-6">
                            <select class="form-control select2" wire:model.live="course_topic_id">
                                <option>Course Topic</option>
                                @foreach ($course_topics as $course)
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
                                        wire:model.live="start_date" placeholder="Start Date" id="start_date" />
                                    <input type="text" class="form-control @error('end_date') is-invalid @enderror"
                                        wire:model.live="end_date" placeholder="End Date" id="end_date" />
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

                        <div class="col-xxl-1 col-lg-3">
                            <button type="button" class="btn btn-soft-danger w-100" wire:click="resetFormFields()"><i
                                    class="mdi mdi-close-circle align-middle"></i> Clear</button>
                        </div>

                        <div class="col-xxl-1 col-lg-3">
                            <button type="button" class="btn btn-primary w-100" wire:click="exportExcel"
                                wire:target="exportExcel"> <i class="mdi mdi-file-excel align-middle"></i>
                                Export</button>
                        </div>

                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Unit Kerja</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Golongan / Pangkat</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Tanggal Aktifitas</th>
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
                                        <td>{{ $course_activity->participant ? $course_activity->participant->nip : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant ? $course_activity->participant->position : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant ? $course_activity->participant->unit_name : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant->institution ? $course_activity->participant->institution->name : '' }}
                                        </td>
                                        <td>{{ $course_activity->participant->rank ? $course_activity->participant->rank->name : '' }}
                                        </td>
                                        <td>{{ $course_activity->course->title }}</td>
                                        <td>{{ $course_activity->courseTopic->title }}</td>
                                        <td>
                                            @if ($course_activity->file)
                                                <a href="{{ asset('storage/' . $course_activity->file) }}"
                                                    target="_blank" class="btn btn-sm btn-soft-primary">Download</a>
                                            @endif
                                        </td>
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

    <div class="modal fade" id="activityModal" data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activityModalLabel">Absen Peserta Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col">Waktu Mengikuti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($topic_participants))
                                @foreach ($topic_participants as $key => $topic_participant)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $topic_participant->participant->front_name }}
                                            {{ $topic_participant->participant->back_name }}</td>
                                        <td>{{ $topic_participant->created_at->format('d M, Y h:i') }}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('openModal', () => {
                $('#activityModal').modal('show');
            })

            $wire.on('closeModal', () => {
                $('#activityModal').modal('hide');
            })
        </script>
    @endscript

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
