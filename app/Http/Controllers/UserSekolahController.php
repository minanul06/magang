<?php

namespace App\Http\Controllers;

use App\Models\UserSekolah;
use App\Models\SekolahImage;
use App\Models\BeritaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserSekolahController extends Controller
{
    public function index(Request $request)
    {
        $jenjang = $request->query('jenjang');
        if ($jenjang) {
            $schools = UserSekolah::where('jenjang_sekolah', $jenjang)->get();
        } else {
            $schools = UserSekolah::all();
        }
        
        return view('daftarsekolah', compact('schools'));
    }

    public function show($id)
    {
        $school = UserSekolah::findOrFail($id);
        $images = SekolahImage::where('sekolahid', $id)->get();
        $news = BeritaSekolah::where('sekolahid', $id)->get();

        return view('daftarsekolah_detail', compact('school', 'images', 'news'));
    }
    public function showProfile()
    {
        $user = Auth::user();
        return view('dashboardsekolah.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kepala_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|string|max:50',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sekolah_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = Auth::user();
        $user->nama_sekolah = $request->nama_sekolah;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->kepala_sekolah = $request->kepala_sekolah;
        $user->jenjang_sekolah = $request->jenjang_sekolah;

        if ($request->hasFile('logo')) {
            $logoName = time().'_logo.'.$request->logo->extension();
            $request->logo->move(public_path('assets'), $logoName);
            $user->logo = $logoName;
        }

        if ($request->hasFile('gambar_kepala_sekolah')) {
            $gambarKepalaSekolahName = time().'_kepala.'.$request->gambar_kepala_sekolah->extension();
            $request->gambar_kepala_sekolah->move(public_path('assets'), $gambarKepalaSekolahName);
            $user->gambar_kepala_sekolah = $gambarKepalaSekolahName;
        }

        $user->save();

        if ($request->hasFile('sekolah_images')) {
            foreach ($request->file('sekolah_images') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('assets'), $imageName);

                $sekolahImage = new SekolahImage();
                $sekolahImage->sekolahid = $user->id;
                $sekolahImage->gambar = $imageName;
                $sekolahImage->save();
            }
        }

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function removeImage($imageId)
    {
        $user = Auth::user();
        $image = SekolahImage::findOrFail($imageId);

        // Ensure the image belongs to the authenticated user
        if ($image->sekolahid != $user->id) {
            return redirect()->back()->with('error', 'Anda tidak diizinkan menghapus gambar ini.');
        }

        // Delete the image file from the public/assets directory
        $imagePath = public_path('assets/' . $image->gambar);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }





    
    


    public function create()
    {
        // No need to pass $user variable
        return view('dashboardadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kepala_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|string|max:50',
            'password' => 'required|string|min:8|confirmed',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_kepala_sekolah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sekolah_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validation for multiple images
        ]);

        $user = new UserSekolah();
        $user->nama_sekolah = $request->nama_sekolah;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->kepala_sekolah = $request->kepala_sekolah;
        $user->jenjang_sekolah = $request->jenjang_sekolah;

        if ($request->hasFile('logo')) {
            $logoName = time().'_logo.'.$request->logo->extension();
            $request->logo->move(public_path('assets'), $logoName);
            $user->logo = $logoName;
        }

        if ($request->hasFile('gambar_kepala_sekolah')) {
            $gambarKepalaSekolahName = time().'_kepala.'.$request->gambar_kepala_sekolah->extension();
            $request->gambar_kepala_sekolah->move(public_path('assets'), $gambarKepalaSekolahName);
            $user->gambar_kepala_sekolah = $gambarKepalaSekolahName;
        }

        $user->save();

        if ($request->hasFile('sekolah_images')) {
            foreach ($request->file('sekolah_images') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('assets'), $imageName);

                $sekolahImage = new SekolahImage();
                $sekolahImage->sekolahid = $user->id;
                $sekolahImage->gambar = $imageName;
                $sekolahImage->save();
            }
        }

        return redirect('/dashboardadmin/viewallusersekolah')->with('success', 'User Sekolah berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $user = UserSekolah::findOrFail($id);
        return view('dashboardadmin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kepala_sekolah' => 'required|string|max:255',
            'jenjang_sekolah' => 'required|string|max:50',
            'password' => 'nullable|string|min:8|confirmed',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sekolah_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = UserSekolah::findOrFail($id);
        $user->nama_sekolah = $request->nama_sekolah;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->kepala_sekolah = $request->kepala_sekolah;
        $user->jenjang_sekolah = $request->jenjang_sekolah;

        if ($request->hasFile('logo')) {
            $logoName = time().'_logo.'.$request->logo->extension();
            $request->logo->move(public_path('assets'), $logoName);
            $user->logo = $logoName;
        }

        if ($request->hasFile('gambar_kepala_sekolah')) {
            $gambarKepalaSekolahName = time().'_kepala.'.$request->gambar_kepala_sekolah->extension();
            $request->gambar_kepala_sekolah->move(public_path('assets'), $gambarKepalaSekolahName);
            $user->gambar_kepala_sekolah = $gambarKepalaSekolahName;
        }

        $user->save();

        if ($request->hasFile('sekolah_images')) {
            foreach ($request->file('sekolah_images') as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('assets'), $imageName);

                $sekolahImage = new SekolahImage();
                $sekolahImage->sekolahid = $user->id;
                $sekolahImage->gambar = $imageName;
                $sekolahImage->save();
            }
        }

        return redirect('/dashboardadmin/viewallusersekolah')->with('success', 'User Sekolah berhasil diperbarui.');
    }
    
    public function deleteImage($userId, $imageId)
    {
        $user = UserSekolah::findOrFail($userId);
        $image = SekolahImage::findOrFail($imageId);

        // Delete the image file from the public/assets directory
        $imagePath = public_path('assets/' . $image->gambar);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }

    public function destroy($id)
    {
        $user = UserSekolah::findOrFail($id);
        $user->delete();

        return redirect('/dashboardadmin/viewallusersekolah')->with('success', 'User Sekolah deleted successfully');
    }
}