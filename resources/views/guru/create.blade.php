@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
         <div class="card">
        <h4 class="card-header text-success">Tambah Guru</h4>
        <div class="card-body">
          <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center" >
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="profile_photo">Foto Profil</label>
                        <input type="file" class="form-control-file" id="profile_photo" name="profile_photo" accept="image/*" required onchange="previewImage(event)">
                        @error('profile_photo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- Menampilkan preview foto -->
                        <img id="preview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; margin-top: 10px; display: none;">
                      </div>
                    </div>


              <div class="col-lg-4">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>

                    @error('nama')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="ttl">Tanggal Lahir</label>
                      <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl') }}" required>
                      @error('ttl')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}" required>

                    @error('nip')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>

                  @error('jabatan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                      <option value="">------ Pilih Jenis Kelamin ------</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>

                    @error('jenis_kelamin')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                <div class="form-group">
                  <label for="nama_rekening">Nama Rekening (BANK)</label>
                  <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" id="nama_rekening" name="nama_rekening" value="{{ old('nama_rekening') }}" required>

                  @error('nama_rekening')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="no_rekening">No Rekening</label>
                  <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening" value="{{ old('no_rekening') }}" required>

                  @error('no_rekening')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
