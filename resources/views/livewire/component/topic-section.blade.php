<div class="card">
    <div class="card-body">
        {{-- <div class="w-100 mb-4">
            <img src="https://sibangkolak.serangkota.go.id/pluginfile.php/2/course/section/1/Blue%20Modern%20Dance%20.png"
                alt="" class="img-fluid">
        </div> --}}

        @if (empty($topic))
            <div class="d-flex">
                <div class="flex-grow-1 overflow-hidden">
                    <h5 class="text-truncate font-size-20">Silahkan Pilih Topik di Samping</h5>
                    <p class="text-muted"></p>
                </div>
            </div>
        @else
            <div class="d-flex">
                <div class="flex-shrink-0 me-4">
                    @if ($type_topic_id == 1)
                        <img src="https://cdn-icons-png.freepik.com/512/4096/4096116.png" alt=""
                            class="avatar-sm">
                    @elseif($type_topic_id == 2)
                        <img src="https://i.pinimg.com/474x/37/29/61/3729617452425f23b079bb0de458293a.jpg"
                            alt="" class="avatar-sm">
                    @elseif($type_topic_id == 3)
                        <img src="https://t3.ftcdn.net/jpg/03/53/29/06/360_F_353290649_5NrbdD4T7JbiySZ5FisIF9s6P3kmkeif.jpg"
                            alt="" class="avatar-sm">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVVTLiOtOhKeWLlpG6v3H5Wp7Cop3yuiQiaA&s"
                            class="avatar-sm" alt="">
                    @endif
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <h5 class="text-truncate font-size-20">{{ $title }}</h5>
                    <h4 class="font-size-14">Waktu : Pukul {{ date('H:i', strtotime($start_at)) }} -
                        {{ date('H:i', strtotime($end_at)) }}</h4>
                </div>
            </div>

            <h5 class="font-size-20 mt-4">Deskripsi Topik :</h5>

            <p class="text-muted">{{ $description }}</p>

            @if ($success)
                @if ($type_topic_id == null)
                    <div class="d-flex align-items-center">
                        <div style="width: 60px;">
                            <div class="avatar-sm d-flex align-items-center justify-content-center">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                    <i class="bx bxs-file-doc"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="font-size-14 mb-1">
                                <a href="{{ url('storage/' . $file) }}" class="text-dark" target="_blank">File SPT</a>
                            </h5>
                            <small></small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ url('storage/' . $file) }}" class="text-dark" target="_blank">
                                <i class="bx bx-download h3 m-0"></i>
                            </a>
                        </div>
                    </div>
                @elseif($type_topic_id == 1)
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_id }}"
                        frameborder="0" allowfullscreen title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                @elseif($type_topic_id == 2)
                    <div class="d-flex align-items-center">
                        <div style="width: 60px;">
                            <div class="avatar-sm d-flex align-items-center justify-content-center">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                    <i class="bx bxs-file-doc"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="font-size-14 mb-1">
                                <a href="{{ $document_url }}" class="text-dark" target="_blank">Download Materi</a>
                            </h5>
                            <small></small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ $document_url }}" class="text-dark" target="_blank">
                                <i class="bx bx-download h3 m-0"></i>
                            </a>
                        </div>
                    </div>
                @elseif($type_topic_id == 3)
                    <a href="{{ $zoom_url }}" class="text-dark" target="_blank" class="mb-3"><img width="200px"
                            src="https://my.de.marist.edu/documents/223318/1893677/Zoom-Logo-Vector-.png/61edb984-8879-4648-a364-596716bb4d2d?t=1642001250000"
                            alt="{{ $title }}" class="img-fluid"></a>
                    <div class="mt-4">
                        Link Zoom :
                        <a href="{{ $zoom_url }}" target="_blank">{{ $zoom_url }}</a>
                    </div>
                @endif
            @else
                <a href="javascript:void(0)" class="btn btn-primary" wire:click="confirmStartTopic">Mulai Topik</a>
            @endif
        @endif
    </div>

    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="modalUploadFile"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">File <small class="text-info">* Max. 2 MB,
                                PDF|DOC|DOCX|PNG|JPG|JPEG</small></label>
                        <input type="file" class="form-control" wire:model="file">
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="uploadSPT">Save</button>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('showModalUploadFile', () => {
                $('#modalUploadFile').modal('show');
            });

            $wire.on('refreshPage', () => {
                location.reload();
            });
        </script>
    @endscript
</div>
