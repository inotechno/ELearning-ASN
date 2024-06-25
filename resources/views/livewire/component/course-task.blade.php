<div>
    @if (count($courseTopics) > 0)
        @foreach ($courseTopics as $date => $topics)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ $date }}</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td style="width: 40px;">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" disabled
                                                    @if ($topic['success']) checked @endif type="checkbox"
                                                    id="topic-{{ $topic['id'] }}">
                                                <label class="form-check-label" for="topic-{{ $topic['id'] }}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="text-truncate font-size-14 m-0">
                                                <a href="javascript: void(0);"
                                                    class="text-dark" wire:click="$dispatch('selectTopic', { id: {{ $topic['id'] }}, success: {{ (int) $topic['success'] }} })">{{ $topic['title'] }}</a>
                                            </h5>
                                        </td>

                                        <td>
                                            <div class="text-center">
                                                <span class="badge rounded-pill badge-soft-secondary font-size-11">
                                                    {{ date('H:i', strtotime($topic['start_at'])) }} -
                                                    {{ date('H:i', strtotime($topic['end_at'])) }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No topics available</p>
    @endif
</div>
