<div>
    <div class="row">

        <div class="col-lg-4">
            <div class="mb-3">
                <label for="basicpill-pancard-input"> Institusi</label>
                <select wire:model='institution_id' class="form-control @error('institution_id') is-invalid @enderror">
                    <option value="">Pilih Institusi</option>
                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">
                            {{ $institution->name }}
                        </option>
                    @endforeach
                </select>

                @error('institution_id')
                    <span class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label for="basicpill-vatno-input">Pendidikan</label>
                <select wire:model='education_id' class="form-control @error('education_id') is-invalid @enderror">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}">{{ $education->name }}
                        </option>
                    @endforeach
                </select>

                @error('education_id')
                    <span class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label for="basicpill-vatno-input">Golongan </label>
                <select wire:model='rank_id' class="form-control @error('rank_id') is-invalid @enderror">
                    <option value="">Pilih for Golongan</option>
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->id }}">{{ $rank->name }}
                        </option>
                    @endforeach
                </select>

                @error('rank_id')
                    <span class="invalid-feedback" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="form-label">Nama Posisi</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" wire:model="position">

            @error('position')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="form-label">Nama Unit</label>
            <input type="text" class="form-control @error('unit_name') is-invalid @enderror" wire:model="unit_name">

            @error('unit_name')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-12 d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-primary mt-3" wire:click="updatePersonnelData"><i
                    class="bx bx-save"></i>
                Update</button>
        </div>
    </div>

</div>
