<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Guru;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'unique' => ':attribute sudah terdaftar. Silakan gunakan NIP yang berbeda.',
            'max' => 'Maksimal :max karakter.',
        ];

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus,nip|max:255',
            'jabatan' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nama_rekening' => 'required|string|max:255',
            'no_rekening' => 'required|string|max:225',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ttl' => 'required|date',
        ], $messages, [
            'nama' => 'Nama',
            'nip' => 'NIP',
            'jabatan' => 'Jabatan',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nama_rekening' => 'Nama Rekening',
            'no_rekening' => 'No Rekening',
            'profile_photo' => 'Foto Profil',
            'ttl' => 'Tanggal Lahir',
        ]);

        $profilePhotoPath = null;
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $namaFile = str_slug($request->nama) . '_' . uniqid() . '.' . $profilePhoto->getClientOriginalExtension();
            $profilePhotoPath = $profilePhoto->storeAs('profile-photos', $namaFile, 'public');
        }


        Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_rekening' => $request->nama_rekening,
            'no_rekening' => $request->no_rekening,
            'profile_photo' => $profilePhotoPath,
            'ttl' => $request->ttl,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return abort(404);
        }

        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $guru = Guru::find($id);

        if (!$guru) {
            return abort(404);
        }

        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'required|string|unique:gurus,nip,' . $id . '|max:255',
        'jabatan' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'no_rekening' => 'required|string|max:255',
        'nama_rekening' => 'required|string|max:255',
        'ttl' => 'required|date',
        'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $guru = Guru::findOrFail($id);

    if ($request->hasFile('profile_photo')) {

        if ($guru->profile_photo) {
            Storage::disk('public')->delete($guru->profile_photo);
        }
        $profilePhoto = $request->file('profile_photo');
        $namaFile = str_slug($request->nama) . '_' . uniqid() . '.' . $profilePhoto->getClientOriginalExtension();
        $profilePhotoPath = $profilePhoto->storeAs('profile-photos', $namaFile, 'public'); // Menyimpan foto ke
        $guru->profile_photo = $profilePhotoPath;
    }

    $guru->update([
        'nama' => $request->nama,
        'nip' => $request->nip,
        'jabatan' => $request->jabatan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_rekening' => $request->no_rekening,
        'nama_rekening' => $request->nama_rekening,
        'ttl' => $request->ttl,
    ]);

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */



    public function destroy(Request $request, $id = null)
    {
        $pilihGuruId = $request->input('selected_guru');
        if ($pilihGuruId) {

            foreach ($pilihGuruId as $guruId) {
                $guru = Guru::find($guruId);
                if ($guru) {
                    if ($guru->profile_photo);
                    Storage::disk('public')->delete($guru->profile_photo);
                }
                $guru->delete();
            }
        }

        return redirect()->route('guru.index')->with('success', 'Guru yang dipilih berhasil dihapus.');



    }


}
