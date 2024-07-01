<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $title ?? 'Default Page' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        @foreach ($breadcrumb as $index => $item)
                            @if ($index < count($breadcrumb) - 1)
                                <li class="breadcrumb-item">
                                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item active">{{ $item['label'] }}</li>
                            @endif
                        @endforeach
                    </ol>
                </div>

            </div>
        </div>
    </div>

</div>
