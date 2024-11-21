<div class="container">

    @if (session()->has('berhasil'))
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                <strong>Berhasil !,</strong> {{ session('berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
    </div>
    @endif
    
    <!-- START FORM -->
    <div class="my-3 p-3 bg-body rounded shadow-sm mt-4">
        <form>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" wire:model="nama"> 
                    {{-- wire:model="nama" fungsi ini sakti banget, 
                        ini udah termasuk name, 
                        fungsi old yang biasa kita kalo ngisi di form ada yang salah ga ilang nilai yang ada di input nya,
                        terus ini juga termasuk value="",
                        tapi syarat kalo mau pake fungsi wire:model ini
                        kita harus punya property di dalam class kita.
                        mungkin masih banyak keutamaan lain nya --}}
                    @error('nama') <div class="invalid-feedback">{{ $message  }}</div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" wire:model="email">
                    @error('email') <div class="invalid-feedback">{{ $message  }}</div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  @error('alamat') is-invalid @enderror" wire:model="alamat">
                    @error('alamat') <div class="invalid-feedback">{{ $message  }}</div> @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    
                @if ($updateData == false)
                <button type="button" class="btn btn-primary" name="submit" wire:click='store()'>SIMPAN</button>
                @else
                <button type="button" class="btn btn-primary" name="submit" wire:click='update()'>UPDATE</button>
                @endif
                <button type="button" class="btn btn-outline-danger" name="submit" wire:click='clear()'>HAPUS</button>

                </div>
            </div>
        </form>
    </div>
    <!-- AKHIR FORM -->

    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>Data Pegawai</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-3">Email</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataEmployees as $key => $item)
                <tr>
                    <td>{{ $dataEmployees->firstItem() + $key }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a wire:click="edit({{ $item->id }})" class="btn btn-warning btn-sm">Edit</a>
                        <a wire:click="delete_confirmation({{ $item->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- AKHIR DATA -->

    {{ $dataEmployees->links() }}


    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Delete</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             Yakin akan menghapus data ini ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="button" class="btn btn-success" data-bs-dismiss="modal" wire:click="delete()" >Iya</button>
            </div>
          </div>
        </div>
      </div>
</div>