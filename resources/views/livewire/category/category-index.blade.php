<div>
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Search for ...">
        </div>

        <div class="col-md-6">
            <a href="javascript:void(0)" class="btn btn-primary float-end" wire:click="create">Create new category</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md">
            <div class="card jobs-categories">
                <div class="card-body row">

                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="javascript:void(0)" class="px-3 py-2 rounded bg-light bg-opacity-50 d-block mb-2">
                            <button type="button" class="btn btn-warning btn-sm rounded btn-icon-prepend" wire:click="edit({{ $category->id }})"><i class="mdi mdi-pencil"></i></button> 
                            <button type="button" class="btn btn-danger btn-sm rounded btn-icon-prepend me-2" wire:click="confirmDelete({{ $category->id }})"><i class="mdi mdi-trash-can"></i></button> 
                            {{ $category->name }} 
                            <span class="badge text-bg-info float-end bg-opacity-100">{{ $category->courses->count() }} </span>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="store(false)">Save</button>
                    <button type="button" class="btn btn-primary" wire:click="store(true)">Save and Close</button>
                </div>
            </div>
        </div>
    </div>


    @script
        <script>
            $wire.on('showEditModal', () => {
                $('#modalEdit').modal('show');
            });

            $wire.on('closeEditModal', () => {
                $('#modalEdit').modal('hide');
            });

            $wire.on('showCreateModal', () => {
                $('#modalCreate').modal('show');
            });

            $wire.on('closeCreateModal', () => {
                $('#modalCreate').modal('hide');
            });
        </script>
    @endscript
</div>
