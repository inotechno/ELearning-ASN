<div>
    <div class="mb-3">
        <div class="row">
            <div class="col-md mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" wire:model.live="add_status">
                    <option value="">Select for status</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" wire:model.live="add_title">
            </div>

            <div class="col-md mb-3" wire:ignore>
                <label for="form-label">Start At</label>
                <div class="input-group mb-3 start-at-group">
                    <input type="text" class="form-control start-date" id="start_date" placeholder="yyyy-mm-dd"
                        data-date-format="yyyy-mm-dd" data-provide="datepicker" wire:model.live="start_date">

                    <input type="text" class="form-control start-time" id="start_time" data-provide="timepicker"
                        wire:model.live='start_time'>
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3" wire:ignore>
                    <label for="form-label">End At</label>
                    <div class="input-group mb-3 end-at-group">
                        <input type="text" class="form-control end-date" id="end_date" placeholder="yyyy-mm-dd"
                            data-date-format="yyyy-mm-dd" data-provide="datepicker" wire:model.live='end_date'>

                        <input type="text" class="form-control end-time" id="end_time" data-provide="timepicker"
                            wire:model.live="end_time">
                    </div>
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Type Topic</label>
                    <select class="form-control" wire:model.live='add_type_topic_id'>
                        <option value="">Select for type topic</option>
                        @foreach ($typeTopics as $typeTopic)
                            <option value="{{ $typeTopic->id }}">{{ $typeTopic->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md mb-3">
                    <label for="form-label">Percentage Value</label>
                    <input type="number" class="form-control" wire:model.live='add_percentage_value'>
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3">
                    @if ($add_type_topic_id == 1)
                        <label class="form-label">Video URL</label>
                        <input type="text" class="form-control" wire:model.live='add_video_url'>
                    @elseif ($add_type_topic_id == 2)
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" wire:model.live='add_document_path'>
                    @elseif ($add_type_topic_id == 3)
                        <label class="form-label">Zoom URL</label>
                        <input type="text" class="form-control" wire:model.live='add_zoom_url'>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" wire:model.live='add_description'></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-primary mt-3" wire:click="addRow"><i class="bx bx-plus"></i>
                        Add Topic</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle table-nowrap table-check">
            <thead class="table-light">
                <tr>
                    <th scope="col" style="width: 70px;">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start At</th>
                    <th scope="col">End At</th>
                    <th scope="col">Type Topic</th>
                    <th scope="col">Percentage Value</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($topics) || count($topics) > 0)

                    @foreach ($topics as $key => $topic)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $topic['status'] }}</td>
                            <td>{{ $topic['title'] }}</td>
                            <td>{{ $topic['start_at'] }}</td>
                            <td>{{ $topic['end_at'] }}</td>
                            <td>{{ $topic['type_topic_id'] != "" ? $topic['type_name'] : "" }}</td>
                            <td>{{ $topic['percentage_value'] }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger" wire:click="deleteTopic({{ $key }})"><i
                                        class="bx bx-trash"></i></button>
                                <button class="btn btn-sm btn-primary" wire:click="editTopic({{ $key }})"><i
                                        class="bx bx-edit"></i></button>
                                {{-- <button class="btn btn-sm btn-danger" wire:click="deleteTopic({{ $topic[$key] }})"><i
                                        class="bx bx-trash"></i></button>
                                <button class="btn btn-sm btn-primary" wire:click="editTopic({{ $topic[$key] }})"><i
                                        class="bx bx-edit"></i></button> --}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-end fw-bold">Total</td>
                    <td colspan="2">{{ $total_percentage_value }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @script
        <script>
            initializeDateTimePickers();

            function initializeDateTimePickers() {
                $('.start-date').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                }).on('changeDate', function(e) {
                    $wire.set('start_date', e.format(0, 'yyyy-mm-dd'));
                });

                $('.end-date').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                }).on('changeDate', function(e) {
                    $wire.set('end_date', e.format(0, 'yyyy-mm-dd'));
                })

                $('.start-time').timepicker({
                    showMeridian: false, // Set format 24 jam
                    defaultTime: 'current',
                    appendWidgetTo: '.start-at-group',
                    icons: {
                        up: 'bx bx-chevron-up',
                        down: 'bx bx-chevron-down'
                    }
                }).on('changeTime.timepicker', function(e) {
                    $wire.set('start_time', e.time.value);
                });

                $('.end-time').timepicker({
                    showMeridian: false, // Set format 24 jam
                    defaultTime: 'current',
                    appendWidgetTo: '.end-at-group',
                    icons: {
                        up: 'bx bx-chevron-up',
                        down: 'bx bx-chevron-down'
                    }
                }).on('changeTime.timepicker', function(e) {
                    $wire.set('end_time', e.time.value);
                });
            }
        </script>
    @endscript
</div>
