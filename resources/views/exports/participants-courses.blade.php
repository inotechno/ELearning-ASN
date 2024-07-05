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
            <th scope="col">Tanggal Mengikuti</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($participants_courses as $index => $participant)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $participant->front_name }} {{ $participant->back_name }}</td>
                <td>{{ $participant->nip }}</td>
                <td>{{ $participant->position }}</td>
                <td>{{ $participant->unit_name }}</td>
                <td>{{ $participant->institution->name }}</td>
                <td>{{ $participant->rank->name }}</td>
                <td>{{ $participant->courses->first()->title }}</td>
                <td>
                    <ul class="list-unstyled">
                        @foreach ($participant->activities as $activity)
                            <li>
                                <span
                                    class="badge rounded-pill badge-soft-primary font-size-12">{{ $activity->courseTopic->title }}</span>
                            </li>
                        @endforeach
                    </ul>
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
    </tbody>
</table>
