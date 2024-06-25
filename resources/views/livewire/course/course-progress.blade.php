<div>
    <div class="row">
        <div class="col-lg-4">
            @livewire('component.course-task', ['course' => $course], key($course->id))
        </div>

        <div class="col-lg-8">
            @livewire('component.topic-section')
        </div>
    </div>
</div>
