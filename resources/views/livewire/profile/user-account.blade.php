<div>
    <div class="row">
        <div class="col-12 mb-3">
            <h5 class="mb-3">Image</h5>
            <div class="avatar-wrapper">
                <img class="profile-pic" src="{{ $imagePreview  }}" />
                <div class="upload-button">
                    <i class="bx bx-upload" aria-hidden="true"></i>
                </div>
                <input class="file-upload" type="file" accept="image/*" wire:model="image" />
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="form-label">First Name</label>
            <input type="text" class="form-control" wire:model="front_name" disabled>
        </div>

        <div class="col-md-6 mb-3">
            <label for="form-label">Last Name</label>
            <input type="text" class="form-control" wire:model="back_name" disabled>
        </div>

        <div class="col-md-6 mb-3">
            <label for="form-label">Email</label>
            <input type="email" class="form-control" wire:model="email">
        </div>

        <div class="col-md-6 mb-3">
            <label for="form-label">Username</label>
            <input type="text" class="form-control" wire:model="username">
        </div>

        <div class="col-12 d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-primary mt-3" wire:click="updateProfile"><i class="bx bx-save"></i>
                Update</button>
        </div>
    </div>

    @push('css')
        <style>
            .avatar-wrapper {
                position: relative;
                height: 200px;
                width: 200px;
                margin: 50px auto;
                border-radius: 50%;
                overflow: hidden;
                box-shadow: 1px 1px 15px -5px black;
                transition: all .3s ease;

                &:hover {
                    transform: scale(1.05);
                    cursor: pointer;
                }

                &:hover .profile-pic {
                    opacity: .5;
                }

                .profile-pic {
                    height: 100%;
                    width: 100%;
                    transition: all .3s ease;

                    &:after {
                        content: "";
                        background: url('https://unpkg.com/boxicons@2.1.1/svg/regular/bx-camera.svg') no-repeat center center;
                        background-size: 80%;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        background-color: #ecf0f1;
                        opacity: 0.8;
                    }
                }

                .upload-button {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 100%;

                    .fa-arrow-circle-up {
                        position: absolute;
                        font-size: 234px;
                        top: -17px;
                        left: 0;
                        text-align: center;
                        opacity: 0;
                        transition: all .3s ease;
                        color: #34495e;
                    }

                    &:hover .fa-arrow-circle-up {
                        opacity: .9;
                    }
                }
            }
        </style>
    @endpush

    @push('plugin')
        <script>
            $(document).ready(function() {
                $(".upload-button").on('click', function() {
                    $(".file-upload").click();
                });
            });
        </script>
    @endpush
</div>
