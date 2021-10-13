<div>
    <form class="row g-3" wire:submit.prevent="update">
        <input type="hidden" wire:model="produkId">
        <div class="col-12">
            <label for="inputAddress" class="form-label">Nama Produk</label>
            <input type="text" wire:model="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="inputAddress" placeholder="Contoh: Baju lengan pendek" required>
            @error('nama_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-6">
            <label for="inputAddress2" class="form-label">Kode Produk</label>
            <input type="text" wire:model="kode_produk" class="form-control  @error('kode_produk') is-invalid @enderror" id="inputAddress2" placeholder="Contoh: KD123" required>
            @error('kode_produk') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Harga</label>
            <input type="number" wire:model="harga" class="form-control  @error('harga') is-invalid @enderror" id="inputharga" min="1" required>
            @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
    </form>
</div>
