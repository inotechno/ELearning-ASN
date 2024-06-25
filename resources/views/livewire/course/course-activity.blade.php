<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body border-bottom">
                    <div class="row g-3">
                        <div class="col-xxl-4 col-lg-6">
                            <input type="search" class="form-control" id="searchInput" placeholder="Search for ...">
                        </div>
                        <div class="col-xxl-2 col-lg-6">
                            <select class="form-control select2">
                                <option>Status</option>
                                <option value="Active">Active</option>
                                <option value="New">New</option>
                                <option value="Close">Close</option>
                            </select>
                        </div>
                        <div class="col-xxl-2 col-lg-4">
                            <select class="form-control select2">
                                <option>Select Type</option>
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                            </select>
                        </div>
                        <div class="col-xxl-2 col-lg-4">
                            <div id="datepicker1">
                                <input type="text" class="form-control" placeholder="Select date"
                                    data-date-format="dd M, yyyy" data-date-autoclose="true"
                                    data-date-container='#datepicker1' data-provide="datepicker">
                            </div><!-- input-group -->
                        </div>
                        <div class="col-xxl-2 col-lg-4">
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
                                        <td>{{ $course_activity->participant->education ? $course_activity->participant->education->name : '' }}</td>
                                        <td>{{ $course_activity->participant->institution ? $course_activity->participant->institution->name : '' }}</td>
                                        <td>{{ $course_activity->participant->rank ? $course_activity->participant->rank->name : '' }}</td>
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

    </div>
</div>
