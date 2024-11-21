<div class="container">

    @if (session()->has('berhasil'))
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                <strong>Berhasil !</strong> {{ session('berhasil') }}
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
                <div class="col-sm-10"><button type="button" class="btn btn-primary" name="submit" wire:click='store()'>SIMPAN</button>
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
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Del</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- AKHIR DATA -->

    {{ $dataEmployees->links() }}

</div>