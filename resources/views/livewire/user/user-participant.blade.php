<div>
    <div class="row d-flex justify-content-between mb-3">
        <div class="col-md-4 col-lg-3 col-sm-6 col-12">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Search...">
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-12">
            <div class="row">
                <label for="form-label" class="col-sm-4 col-form-label">Limit</label>
                <div class="col-sm-8">
                    <select class="form-control" wire:model.live="limit">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- Input Search And Limit --}}
    </div>
    <div class="table-responsive">
        <table class="table table-borderless align-middle nowrap">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>

                    <th scope="col">Action</th>
                    {{-- <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr wire:key="user-{{ $user->id }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->status == 1)
                                <span class="badge rounded-pill badge-soft-primary font-size-12">Active</span>
                            @else
                                <span class="badge rounded-pill badge-soft-danger font-size-12">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d M, Y h:i') }}</td>

                        <td>
                            <ul class="list-unstyled hstack gap-1 mb-0">
                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Change Status">
                                    <a href="javascript:void(0)"
                                        class="btn btn-sm p-0 px-2 @if ($user->status == 0) btn-success @else btn-danger @endif"
                                        wire:click="$dispatch('changeStatusConfirm', {id: {{ $user->id }}, type:'all' })"><i
                                            class="mdi mdi-swap-horizontal mdi-18px"></i></a>
                                </li>
                                @livewire('component.edit-user', ['user' => $user], key($user->id))
                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                    <a href="javascript:void(0);"
                                        wire:click="$dispatch('confirmDelete', {id: {{ $user->id }} })"
                                        class="btn btn-sm btn-soft-danger p-0 px-2"><i
                                            class="mdi mdi-delete-outline mdi-18px"></i></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-between align-items-center">
        {{ $users->links() }}
        <!--end col-->
    </div>
</div>
