<div>
    @foreach ($topics as $index => $topic)
        <div id="row-{{ $index }}" class="mb-3" wire:key="topic-{{ $index }}">
            <div class="row">
                <div class="col-md mb-3">
                    <label class="form-label">Status</label>
                    <select wire:model.live="topics.{{ $index }}.status"
                        class="form-control @error('status') is-invalid @enderror">
                        <option value="">Select for status</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            <span role="alert">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        wire:model.live="topics.{{ $index }}.title">

                    @error('title')
                        <div class="invalid-feedback">
                            <span role="alert">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="col-md mb-3">
                    <label for="form-label">Start At</label>
                    <div class="input-group mb-3 date-time-group" data-index="{{ $index }}">
                        <input type="text" class="form-control start-date @error('start_at') is-invalid @enderror"
                            placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                
                        <input type="text" class="form-control start-time" data-provide="timepicker">
                        <input type="hidden" class="start-at" wire:model.live="topics.{{ $index }}.start_at">
                    </div>
                
                    @error('start_at')
                        <div class="text-danger">
                            <span role="alert">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3">
                    <label for="form-label">End At</label>
                    <div class="input-group mb-3 date-time-group" data-index="{{ $index }}">
                        <input type="text" class="form-control end-date @error('end_at') is-invalid @enderror"
                            placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-provide="datepicker">
                
                        <input type="text" class="form-control end-time" data-provide="timepicker">
                        <input type="hidden" class="end-at" wire:model.live="topics.{{ $index }}.end_at">
                    </div>
                
                    @error('end_at')
                        <div class="text-danger">
                            <span role="alert">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Type Topic</label>
                    <select wire:model.live="topics.{{ $index }}.type_topic_id" class="form-control">
                        <option value="">Select for type topic</option>
                        @foreach ($typeTopics as $typeTopic)
                            <option value="{{ $typeTopic->id }}">{{ $typeTopic->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md mb-3">
                    <label for="form-label">Percentage Value</label>
                    <input type="number" class="form-control @error('percentage_value') is-invalid @enderror"
                        wire:model.live="topics.{{ $index }}.percentage_value">

                    @error('percentage_value')
                        <div class="invalid-feedback">
                            <span role="alert">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3">
                    @if ($topic['type_topic_id'] == 1)
                        <label class="form-label">Video URL</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror"
                            wire:model.live="topics.{{ $index }}.video_url">

                        @error('video_url')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    @elseif ($topic['type_topic_id'] == 2)
                        <label class="form-label">File</label>
                        <input type="file" class="form-control @error('document_path') is-invalid @enderror"
                            wire:model.live="topics.{{ $index }}.document_path">

                        @error('document_path')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    @elseif ($topic['type_topic_id'] == 3)
                        <label class="form-label">Zoom URL</label>
                        <input type="text" class="form-control @error('zoom_url') is-invalid @enderror"
                            wire:model.live="topics.{{ $index }}.zoom_url">

                        @error('zoom_url')
                            <div class="invalid-feedback">
                                <span role="alert">{{ $message }}</span>
                            </div>
                        @enderror
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md mb-3-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                        wire:model.live="topics.{{ $index }}.description"></textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            <span role="alert">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-end gap-2">
                    @if ($index > 0)
                        <button type="button" class="btn btn-danger mt-3"
                            wire:click="removeRow({{ $index }})"><i class="bx bx-minus"></i></button>
                    @endif
                    <button type="button" class="btn btn-primary mt-3" wire:click="addRow"><i
                            class="bx bx-plus"></i></button>
                </div>
            </div>
        </div>
    @endforeach

</div>
