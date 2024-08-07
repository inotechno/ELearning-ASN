    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-semibold mb-4">Persentasi Pencapaian</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Persentasi</th>
                                <th scope="col">Kualifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                                <tr>
                                    <td scope="col">{{ $participant['name'] }}</td>
                                    <td scope="col"><span
                                            class="badge bg-{{ $participant['total_progress'] > 50 ? "success" : "warning" }}">{{ $participant['total_progress'] }}
                                            %</span></td>
                                    <td scope="col">{{ $participant['qualification'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
