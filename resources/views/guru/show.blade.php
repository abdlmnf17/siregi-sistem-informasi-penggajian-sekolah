@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Detail Guru</div>
                @if($guru->profile_photo)
                <div class="form-group">
                    <label for="profile_photo"></label><br>
                    <div style="display: flex; justify-content: center; align-items: center; height: 30vh;">
                        <img src="{{ asset('storage/' . $guru->profile_photo) }}" alt="Profile Photo" style="max-width: 150px;">
                    </div>


                </div>
                @endif

                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" value="{{ $guru->nama }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="ttl">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="ttl" value="{{ $guru->ttl }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP:</label>
                        <input type="text" class="form-control" id="nip" value="{{ $guru->nip }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" value="{{ $guru->jabatan }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="jenis_kelamin" value="{{ $guru->jenis_kelamin }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_rekening">Nama Rekening (BANK):</label>
                        <input type="text" class="form-control" id="nama_rekening" value="{{ $guru->nama_rekening }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="no_rekening">No Rekening:</label>
                        <input type="text" class="form-control" id="no_rekening" value="{{ $guru->no_rekening }}" readonly>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
