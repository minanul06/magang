<?php

namespace App\Http\Controllers;

use App\Models\BeritaSekolah;
use App\Models\BeritaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaSekolahController extends Controller
{
    public function show($id)
    {
        $berita = BeritaSekolah::with('images')->findOrFail($id);
        return view('detail_berita', compact('berita'));
    }

    public function create()
    {
        return view('dashboardsekolah.createNewBerita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required|string',
            'images' => 'sometimes|array',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $sekolahId = $user->id;

        $berita = BeritaSekolah::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
            'sekolahid' => $sekolahId,
        ]);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = microtime(true) . '.' . $image->extension();
                $image->move(public_path('assets'), $imageName);

                BeritaImage::create([
                    'beritaid' => $berita->id,
                    'gambar' => $imageName,
                ]);
            }
        }

        return redirect()->route('dashboardsekolah')->with('success', 'Berita berhasil ditambahkan');
    }

    public function myBerita()
    {
        $user = Auth::user();
        $sekolahId = $user->id;

        $beritas = BeritaSekolah::where('sekolahid', $sekolahId)->with('images')->get();

        return view('dashboardsekolah.myberita', compact('beritas'));
    }

    public function edit($id)
    {
        $berita = BeritaSekolah::findOrFail($id);
        return view('dashboardsekolah.editBerita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required|string',
            'images' => 'sometimes|array',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = BeritaSekolah::findOrFail($id);
        $berita->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
        ]);

        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = BeritaImage::findOrFail($imageId);
                $imagePath = public_path('assets/' . $image->gambar);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        }

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = microtime(true) . '.' . $image->extension();
                $image->move(public_path('assets'), $imageName);

                BeritaImage::create([
                    'beritaid' => $berita->id,
                    'gambar' => $imageName,
                ]);
            }
        }

        return redirect()->route('dashboardsekolah.myBerita')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $berita = BeritaSekolah::findOrFail($id);

        foreach ($berita->images as $image) {
            $imagePath = public_path('assets/' . $image->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $berita->delete();

        return redirect()->route('dashboardsekolah.myBerita')->with('success', 'Berita berhasil dihapus');
    }

    public function allBerita()
    {
        $beritas = BeritaSekolah::with('images')->get();
        return view('dashboardadmin.allberita', compact('beritas'));
    }

    public function editByAdmin($id)
    {
        $berita = BeritaSekolah::findOrFail($id);
        return view('dashboardadmin.editBerita', compact('berita'));
    }

    public function updateByAdmin(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required|string',
            'images' => 'sometimes|array',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = BeritaSekolah::findOrFail($id);
        $berita->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
        ]);

        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = BeritaImage::findOrFail($imageId);
                $imagePath = public_path('assets/' . $image->gambar);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        }

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = microtime(true) . '.' . $image->extension();
                $image->move(public_path('assets'), $imageName);

                BeritaImage::create([
                    'beritaid' => $berita->id,
                    'gambar' => $imageName,
                ]);
            }
        }

        return redirect()->route('admin.allBerita')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroyByAdmin($id)
    {
        $berita = BeritaSekolah::findOrFail($id);

        foreach ($berita->images as $image) {
            $imagePath = public_path('assets/' . $image->gambar);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $berita->delete();

        return redirect()->route('admin.allBerita')->with('success', 'Berita berhasil dihapus');
    }

    public function createByAdmin()
    {
        $userSekolahs = \App\Models\UserSekolah::all();
        return view('dashboardadmin.createNewBerita', compact('userSekolahs'));
    }

    public function storeByAdmin(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required|string',
            'sekolahid' => 'required|integer|exists:user_sekolah,id',
            'images' => 'sometimes|array',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $berita = BeritaSekolah::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
            'sekolahid' => $request->sekolahid,
        ]);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = microtime(true) . '.' . $image->extension();
                $image->move(public_path('assets'), $imageName);

                BeritaImage::create([
                    'beritaid' => $berita->id,
                    'gambar' => $imageName,
                ]);
            }
        }

        return redirect()->route('admin.allBerita')->with('success', 'Berita berhasil ditambahkan');
    }


}
