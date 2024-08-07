<div>
    <div class="row">

        <div class="col-md-4 mb-3">
            <label for="form-label">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" wire:model="nip">

            @error('nip')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
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

        <div class="col-md-4 mb-3">
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

        <div class="col-md-4 mb-3">
            <div class="mb-3">
                <label for="basicpill-vatno-input">Pangkat/Golongan </label>
                <select wire:model='rank_id' class="form-control @error('rank_id') is-invalid @enderror">
                    <option value="">Pilih for Pangkat/Golongan</option>
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

        <div class="col-md-4 mb-3">
            <label for="form-label">Jabatan</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" wire:model="position">

            @error('position')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="form-label">Nama Unit Kerja</label>
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
