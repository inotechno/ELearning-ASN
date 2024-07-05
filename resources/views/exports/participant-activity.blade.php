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
            <th scope="col">Tanggal Aktifitas</th>
            {{-- <th scope="col">Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($participant_activities as $key => $course_activity)
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