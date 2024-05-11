@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <h4 class="card-header text-success">Edit Guru</h4>
        <div class="card-body">
          <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $guru->nama }}" required>
                  @error('nama')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ $guru->nip }}" required>
                  @error('nip')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="ttl">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ $guru->ttl }}" required>
                    @error('ttl')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ $guru->jabatan }}" required>
                  @error('jabatan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="no_rekening">No Rekening</label>
                  <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening" value="{{ $guru->no_rekening }}" required>
                  @error('no_rekening')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="no_rekening">Nama Rekening</label>
                  <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" id="nama_rekening" name="nama_rekening" value="{{ $guru->nama_rekening }}" required>
                  @error('no_rekening')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>


              <div class="col-lg-4">
                <div class="form-group">

                  @if($guru->profile_photo)
                  <label for="profile_photo">Foto Profil</label><br/>

                    <img id="profile_photo_preview" src="{{ asset('storage/' . $guru->profile_photo) }}" alt="Profile Photo" style="max-width: 150px;">
                  @endif
                </div>

                <div class="form-group">
                  <input type="file" class="form-control-file @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(event)">
                  @error('profile_photo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <!-- Menampilkan preview foto baru -->
                  <img id="preview" src="#" alt="Preview" style="max-width: 150px; margin-top: 10px; display: none;">
                </div>
              </div>


        </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
