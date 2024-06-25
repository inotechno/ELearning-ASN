<div>
    <div class="mt-4 text-center">
        @if ($exists_participants)
            <span class="btn btn-success">Followed This Course <i class="mdi mdi-check"></i></span>
        @else
            <button type="button" class="btn btn-primary" wire:click="follow()">
                Follow Course <i class="mdi mdi-plus"></i>
            </button>
        @endif
    </div>
</div>
