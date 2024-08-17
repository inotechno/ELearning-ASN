<div><!-- start page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div>
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <a href="javascript: void(0);" class="badge bg-light font-size-12">
                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                                                {{ $course->category->name ?? '' }}
                                            </a>
                                        </div>
                                        <h4>{{ $title ?? '' }}</h4>
                                        <p class="text-muted mb-4"><i
                                                class="mdi mdi-calendar me-1"></i>{{ $created_at->format('d M, Y') ?? '' }}
                                        </p>
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div>
                                                    <p class="text-muted mb-2">Categories</p>
                                                    <h5 class="font-size-15">{{ $course->category->name ?? '' }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mt-4 mt-sm-0">
                                                    <p class="text-muted mb-2">Date</p>
                                                    <h5 class="font-size-15">
                                                        {{ $implementation_start->format('d M, Y') }} -
                                                        {{ $implementation_end->format('d M, Y') }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mt-4 mt-sm-0">
                                                    <p class="text-muted mb-2">Instruktur</p>
                                                    <h5 class="font-size-15">{{ $course->teacher->front_name ?? '' }}
                                                        {{ $course->teacher->back_name ?? '' }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="my-5">
                                        <img src="{{ $img_thumbnail ?? asset('images/small/img-1.jpg') }}"
                                            alt="" class="img-thumbnail mx-auto d-block">
                                    </div>

                                    <hr>

                                    <div class="mt-4">
                                        <div class="text-muted font-size-14">

                                            {!! $description ?? '' !!}


                                            {{-- <div class="mt-4">
                                                <h5 class="mb-3">Title: </h5>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <ul class="ps-4">
                                                                    <li class="py-1">Donec sodales sagittis</li>
                                                                    <li class="py-1">Sed consequat leo eget</li>
                                                                    <li class="py-1">Aliquam lorem ante</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <ul class="ps-4">
                                                                    <li class="py-1">Aenean ligula eget</li>
                                                                    <li class="py-1">Cum sociis natoque</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>

                                        <hr>

                                        <div class="mt-5">
                                            <h5 class="font-size-15"><i
                                                    class="bx bx-message-dots text-muted align-middle me-1"></i>
                                                Topics :</h5>

                                            <div>
                                                @foreach ($topics as $topic)
                                                    <div class="d-flex py-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-1">{{ $topic->title }}<small
                                                                    class="text-muted float-end">{{ $topic->start_at }}</small>
                                                            </h5>
                                                            <p class="text-muted">{!! $topic->description !!}</p>
                                                            <div>

                                                                @hasrole('administrator|teacher')
                                                                    @if ($topic->type_topic_id == 1)
                                                                        <a
                                                                            href="{{ $topic->video_url }}">{{ $topic->typeTopic ? $topic->typeTopic->name : '' }}</a>
                                                                    @elseif($topic->type_topic_id == 2)
                                                                        <a
                                                                            href="{{ $topic->document_path }}">{{ $topic->typeTopic ? $topic->typeTopic->name : '' }}</a>
                                                                    @elseif($topic->type_topic_id == 3)
                                                                        <a
                                                                            href="{{ $topic->zoom_url }}">{{ $topic->typeTopic ? $topic->typeTopic->name : '' }}</a>
                                                                    @endif
                                                                @endhasrole

                                                                @hasrole('participant')
                                                                    <span
                                                                        class="text-success">{{ $topic->typeTopic ? $topic->typeTopic->name : '' }}</span>
                                                                @endhasrole
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>

                                        @hasrole('participant')
                                            @livewire('component.button-follow-course', ['id' => $course->id], key($course->id))
                                        @endhasrole
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    @hasrole('administrator')
        @livewire('course.course-activity', ['slug' => $slug])
    @endhasrole
    <!-- end row -->
</div>
