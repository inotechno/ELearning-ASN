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
        @foreach ($participants_courses as $key => $participant)
            @foreach ($participant->courses as $course)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        {{ $participant ? $participant->front_name : '' }}
                        {{ $participant ? $participant->back_name : '' }}
                    </td>
                    <td>{{ $participant ? $participant->nip : '' }}
                    </td>
                    <td>{{ $participant ? $participant->position : '' }}
                    </td>
                    <td>{{ $participant ? $participant->unit_name : '' }}
                    </td>
                    <td>{{ $participant->institution ? $participant->institution->name : '' }}
                    </td>
                    <td>{{ $participant->rank ? $participant->rank->name : '' }}
                    </td>
                    <td>{{ $course->title }}</td>
                    <td>
                        @foreach ($course->topics as $topic)
                            @if ($topic)
                                {{ $topic->title }} | 
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $course->pivot->created_at->format('d M, Y h:i') }}</td>
                  
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>