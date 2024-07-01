<div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="form-label">Nama Depan</label>
            <input type="text" class="form-control @error('front_name') is-invalid @enderror" wire:model="front_name">

            @error('front_name')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Nama Belakang</label>
            <input type="text" class="form-control @error('back_name') is-invalid @enderror" wire:model="back_name">

            @error('back_name')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Gelar Depan</label>
            <input type="text" class="form-control @error('front_title') is-invalid @enderror"
                wire:model="front_title">

            @error('front_title')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Gelar Belakang</label>
            <input type="text" class="form-control @error('back_title') is-invalid @enderror"
                wire:model="back_title">

            @error('back_title')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" wire:model="nik">

            @error('nik')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('birth_place') is-invalid @enderror"
                wire:model="birth_place">

            @error('birth_place')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                wire:model="birth_date">

            @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Jenis Kelamin</label>
            <select class="form-control @error('gender') is-invalid @enderror" wire:model="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="male">Laki-laki</option>
                <option value="female">Perempuan</option>
            </select>

            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Kota</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model="city">

            @error('city')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">Negara</label>
            <input type="text" class="form-control @error('country') is-invalid @enderror" wire:model="country"
                disabled>

            @error('country')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="form-label">No HP</label>
            <input type="number" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <label for="form-label">Alamat</label>
            <textarea class="form-control @error('address') is-invalid @enderror" wire:model="address" id=""
                cols="30" rows="10"></textarea>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>

        <div class="col-12 d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-primary mt-3" wire:click="updatePersonalData"><i
                    class="bx bx-save"></i>
                Update</button>
        </div>
    </div>
</div>
