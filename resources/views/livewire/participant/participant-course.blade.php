<div>
    <div class="row">
        <div class="col-lg">
            <div class="card">

                <div class="card-body border-bottom">
                    <div class="row g-2">
                        <div class="col-xxl-2 col-lg-6">
                            <input type="search" class="form-control" id="searchInput" placeholder="Search for ..."
                                wire:model.live="search">
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <select class="form-control select2" wire:model.live="course_id">
                                <option>Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
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

                        <div class="col-xxl-2 col-lg-6">
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
                                wire:target="exportExcel" wire:loading.attr="disabled"> <i
                                    class="mdi mdi-file-excel align-middle"></i>
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
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Tanggal Mengikuti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants_courses as $index => $participant)
                                    @foreach ($participant->courses as $course)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $participant->front_name }} {{ $participant->back_name }}</td>
                                            <td>{{ $participant->nip }}</td>
                                            <td>{{ $participant->position }}</td>
                                            <td>{{ $participant->unit_name }}</td>
                                            <td>{{ $participant->institution ? $participant->institution->name : ''  }}</td>
                                            <td>{{ $participant->rank ? $participant->rank->name : '' }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>
                                                <ul class="list-unstyled">
                                                    @foreach ($participant->activities as $activity)
                                                        @if ($activity->course_id == $course->id)
                                                            <li>
                                                                <span
                                                                    class="badge rounded-pill badge-soft-primary font-size-12">{{ $activity->courseTopic->title }}</span>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge
                                                    @if ($course->total_score > 90) bg-success
                                                    @elseif($course->total_score >= 80) bg-primary
                                                    @else bg-danger @endif">
                                                    {{ $course->qualification }} ( {{ $course->total_score }}% )
                                                </span>
                                            </td>
                                            <td>
                                                @if ($participant->activities->isNotEmpty() && $participant->activities->first())
                                                    {{ $participant->activities->first()->created_at->format('d M Y') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        {{ $participants_courses->links() }}
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div><!--end card-->
        </div><!--end col-->
        {{--
        @livewire('component.course-activity-percentage', ['course_id' => $courseId]) --}}
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
