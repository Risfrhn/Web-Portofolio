<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\keahlianModel as Keahlian;
use App\Models\projekModel as projek;
use App\Models\gambarProjekModel as gambarProjek;
use App\Models\sertifikatModel as sertifikat;
use App\Models\fileModel as file;

use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // show
    public function showDashboard()
    {
        $sertifikat = Sertifikat::all();
        $keahlian = Keahlian::all();
        $projek = Projek::all();
        $files = file::all();

        return view('Dashboard.dashboardAdmin', [
            'keahlian' => $keahlian,
            'projek' => $projek,
            'sertifikat' => $sertifikat,
            'files' => $files,
        ]);
    }
    public function showDashboardPengguna()
    {
        $sertifikat = Sertifikat::all();
        $keahlian = Keahlian::all();
        $projek = Projek::all();
        $files = file::all();

        return view('Dashboard.dashboard', [
            'keahlian' => $keahlian,
            'projek' => $projek,
            'sertifikat' => $sertifikat,
            'files' => $files,
        ]);
    }

    public function showDetailProjek($id)
    {
        $projek = projek::findOrFail($id);
        // Periksa apakah pengguna login
        if (auth()->check()) {
            // Jika login, tampilkan view detail untuk admin
            return view('Detail.detailProjekAdmin', compact('projek'));
        } else {
            // Jika tidak login, tampilkan view detail biasa
            return view('Detail.detailProjek', compact('projek'));
        }
    }

    public function showLogin(){
        return view('Auth.loginPage');
    }


    // Login Logout
    public function login(Request $request){
        // Proses login jika request method POST
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $credentials = $request->only('email', 'password');
    
            if (Auth::guard('web')->attempt($credentials)) {
                return redirect()->route('dashboardAdmin');
            } else {
                return redirect()->route('login')->with('error', 'Email atau password salah');
            }
        }
        return redirect()->route('login');
    } 
    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out

        $request->session()->invalidate();  

        $request->session()->regenerateToken();  

        return redirect()->route('login'); 
    }

    // Keahlian
    // Menyimpan data keahlian
    public function storeKeahlian(Request $request)
    {
        $request->validate([
            'nama_keahlian' => 'required',
            'deskripsi' => 'required',
            'icon' => 'required',
        ]);

        $keahlian = new Keahlian();
        $keahlian->title = $request->nama_keahlian;  // Menyimpan nama keahlian ke kolom 'title'
        $keahlian->description = $request->deskripsi;
        $keahlian->icon = $request->icon;
        $keahlian->save();

        return redirect()->route('dashboardAdmin')->with('success', 'Keahlian berhasil ditambahkan!');
    }
    // Menghapus keahlian
    public function destroyKeahlian($id)
    {
        try {
            // Mencari dan menghapus keahlian berdasarkan ID
            $keahlian = Keahlian::findOrFail($id);
            $keahlian->delete();
    
            // Menambahkan pesan sukses ke session
            return redirect()->route('dashboardAdmin')->with('success', 'Keahlian berhasil dihapus!');
        } catch (\Exception $e) {
            // Jika ada error, kirim pesan error ke session
            return redirect()->route('dashboardAdmin')->with('error', 'Terjadi kesalahan, keahlian tidak dapat dihapus!');
        }
    }



    // Sertifikat
    public function storeSertifikat(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar_1' => 'required|image',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        // Cek jika ada file gambar yang diupload
        if ($request->hasFile('gambar_1')) {
            // Membuat nama file gambar yang unik dengan timestamp
            $gambar_1 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar_1')->getClientOriginalName());

            // Pindahkan file gambar ke folder 'public/images'
            $path = $request->file('gambar_1')->move(public_path('images/sertifikat/'), $gambar_1);

            // Simpan data gambar ke database
            $sertifikat = new sertifikat();
            $sertifikat->gambar_1 = 'images/sertifikat/' . $gambar_1; // Simpan path relatif ke database
            $sertifikat->title = $request->title;
            $sertifikat->description = $request->description;
            $sertifikat->save(); // Simpan data ke database
        } else {
            // Jika tidak ada gambar yang diupload
            return redirect()->back()->with('error', 'Gambar sertifikat harus diupload!');
        }

        // Redirect dengan pesan sukses
        return redirect()->route('dashboardAdmin')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    public function destroySertifikat($id)
    {
        try {
            // Mencari dan menghapus keahlian berdasarkan ID
            $sertifikat = sertifikat::findOrFail($id);
            $sertifikat->delete();
    
            // Menambahkan pesan sukses ke session
            return redirect()->route('dashboardAdmin')->with('success', 'Sertifikat berhasil dihapus!');
        } catch (\Exception $e) {
            // Jika ada error, kirim pesan error ke session
            return redirect()->route('dashboardAdmin')->with('error', 'Terjadi kesalahan, keahlian tidak dapat dihapus!');
        }
    }


    // Projek
    public function storeProjek(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'gambar_flyer' => 'required|image',
                'title_1' => 'required|string|max:255',
                'title_2' => 'required|string|max:255',
                'desk_1' => 'required|string',
                'gambar_1' => 'required|image',
                'desk_2' => 'required|string',
                'desk_3' => 'required|string',
            ]);

            // Upload gambar flyer
            if ($request->hasFile('gambar_flyer')) {
                $gambar_flyer = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar_flyer')->getClientOriginalName());
                $path = $request->file('gambar_flyer')->move(public_path('images'), $gambar_flyer);
            }

            // Upload gambar 1
            if ($request->hasFile('gambar_1')) {
                $gambar_1 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('gambar_1')->getClientOriginalName());
                $path = $request->file('gambar_1')->move(public_path('images'), $gambar_1);
            }

            // Simpan ke database
            $detailProjek = new projek(); // Pastikan nama model sesuai
            $detailProjek->gambar_flyer = 'images/' . $gambar_flyer;
            $detailProjek->title_1 = $request->title_1;
            $detailProjek->title_2 = $request->title_2;
            $detailProjek->desk_1 = $request->desk_1;
            $detailProjek->gambar_1 = 'images/' . $gambar_1;
            $detailProjek->desk_2 = $request->desk_2;
            $detailProjek->desk_3 = $request->desk_3;

            if($detailProjek->save()) {
                return redirect()->back()->with('success', 'Detail proyek berhasil disimpan!');
            }

            return redirect()->back()->with('error', 'Gagal menyimpan detail proyek!');

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function editProjek(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'title_1' => 'required|string|max:255',
                'title_2' => 'required|string|max:255',
                'desk_1' => 'required|string',
                'gambar_flyer' => 'nullable|image',
                'gambar_1' => 'nullable|image',
                'desk_2' => 'required|string',
                'desk_3' => 'required|string',
                'link_projek' => 'nullable|string',

                'gambarIcon_1' => 'nullable|image',
                'gambarIcon_2' => 'nullable|image',
                'gambarIcon_3' => 'nullable|image',
                'gambarIcon_4' => 'nullable|image',
                'gambarIcon_5' => 'nullable|image',
                'gambarIcon_6' => 'nullable|image',
                'gambarIcon_7' => 'nullable|image',
                'gambarIcon_8' => 'nullable|image',
                'gambarIcon_9' => 'nullable|image',

                'gambarProjek_1' => 'nullable|image',
                'gambarProjek_2' => 'nullable|image',
                'gambarProjek_3' => 'nullable|image',
                'gambarProjek_4' => 'nullable|image',
                'gambarProjek_5' => 'nullable|image',
                'gambarProjek_6' => 'nullable|image',
                'gambarProjek_7' => 'nullable|image',
                'gambarProjek_8' => 'nullable|image',
                'gambarProjek_9' => 'nullable|image',
            ]);

            // Ambil proyek yang akan diedit
            $detailProjek = projek::findOrFail($id);

            // Fungsi untuk menghapus file lama dan menyimpan gambar baru
            $saveImage = function($fieldName, $imagePath) use ($request, $detailProjek) {
                if ($request->hasFile($fieldName)) {
                    // Hapus gambar lama jika ada
                    if ($detailProjek->{$imagePath} && file_exists(public_path($detailProjek->{$imagePath}))) {
                        unlink(public_path($detailProjek->{$imagePath})); // Menghapus file lama
                    }

                    // Proses gambar baru
                    $fileName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file($fieldName)->getClientOriginalName());
                    $request->file($fieldName)->move(public_path('images'), $fileName);
                    $detailProjek->{$imagePath} = 'images/' . $fileName; // Simpan path gambar baru
                }
            };

            // Update gambar flyer, gambar 1, gambar icon, gambar projek
            $saveImage('gambar_flyer', 'gambar_flyer');
            $saveImage('gambar_1', 'gambar_1');
            
            // Untuk gambar icon
            $gambarIcons = ['gambarIcon_1', 'gambarIcon_2', 'gambarIcon_3', 'gambarIcon_4', 'gambarIcon_5', 'gambarIcon_6', 'gambarIcon_7', 'gambarIcon_8', 'gambarIcon_9'];
            foreach ($gambarIcons as $gambarIcon) {
                $saveImage($gambarIcon, $gambarIcon);
            }

            // Untuk gambar projek
            $gambarProjek = ['gambarProjek_1', 'gambarProjek_2', 'gambarProjek_3', 'gambarProjek_4', 'gambarProjek_5', 'gambarProjek_6', 'gambarProjek_7', 'gambarProjek_8', 'gambarProjek_9'];
            foreach ($gambarProjek as $gambar) {
                $saveImage($gambar, $gambar);
            }

            // Update data lainnya
            $detailProjek->title_1 = $request->title_1;
            $detailProjek->title_2 = $request->title_2;
            $detailProjek->desk_1 = $request->desk_1;
            $detailProjek->desk_2 = $request->desk_2;
            $detailProjek->desk_3 = $request->desk_3;
            $detailProjek->link_projek = $request->link_projek;

            // Simpan perubahan
            if ($detailProjek->save()) {
                return redirect()->back()->with('success', 'Detail proyek berhasil diperbarui!');
            }

            return redirect()->back()->with('error', 'Gagal memperbarui detail proyek!');

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroyProjek($id)
    {
        $projek = projek::findOrFail($id); // Menemukan projek berdasarkan ID
        $projek->delete(); // Menghapus projek
        
        return redirect()->route('dashboardAdmin')->with('success', 'Projek berhasil dihapus');
    }

    public function hapusGambar($id, $index)
    {
        $projek = projek::find($id);

        // Periksa apakah projek ditemukan
        if ($projek) {
            $gambarKey = 'gambarProjek_' . $index;

            // Periksa apakah gambar ada
            if (!empty($projek->$gambarKey)) {
                // Hapus gambar dari disk
                $gambarPath = public_path($projek->$gambarKey);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }

                // Set kolom gambar menjadi null di database
                $projek->$gambarKey = null;
                $projek->save();
            }
        }

        return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
    }

    public function hapusIcon($id, $index)
    {
        $projek = projek::find($id);

        // Periksa apakah projek ditemukan
        if ($projek) {
            // Pastikan $index hanya angka (1, 2, dll) tanpa tambahan 'gambarIcon_'
            $gambarKey = 'gambarIcon_' . $index;

            // Periksa apakah gambar ada
            if (!empty($projek->$gambarKey)) {
                // Hapus gambar dari disk
                $gambarPath = public_path($projek->$gambarKey);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }

                // Set kolom gambar menjadi null di database
                $projek->$gambarKey = null;
                $projek->save();

                // Tambahkan log untuk debugging
                \Log::info('Gambar ' . $gambarKey . ' telah dihapus', ['projek_id' => $projek->id]);
            } else {
                \Log::info('Gambar tidak ditemukan di database', ['projek_id' => $projek->id, 'gambarKey' => $gambarKey]);
            }
        } else {
            \Log::info('Projek tidak ditemukan', ['projek_id' => $id]);
        }

        return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
    }


    // cv
    public function storeFileCv(Request $request)
    {
        $request->validate([
            'file' => 'required|file', // Validasi file
        ]);

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Ambil file lama dari database jika ada
                $existingFile = file::latest()->first(); // Ambil file terbaru dari database, atau sesuaikan dengan logika Anda

                // Jika ada file lama, hapus file tersebut
                if ($existingFile && file_exists(public_path('files/' . $existingFile->CV_name))) {
                    unlink(public_path('files/' . $existingFile->CV_name)); // Menghapus file lama
                    $existingFile->delete(); // Hapus data lama dari database
                }

                // Simpan file baru ke public/files
                $path = $file->move(public_path('files'), $filename);

                // Simpan informasi file baru ke database
                file::create([
                    'CV_name' => $filename,
                    'path' => $path
                ]);

                return redirect()->back()->with('success', 'File berhasil diupload dan file lama telah digantikan!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal upload file: ' . $e->getMessage());
        }
        
        return redirect()->back()->with('error', 'Tidak ada file yang dipilih');
    }

    public function downloadFile($filename)
    {
        try {
            // Tentukan path file di direktori public/files
            $filePath = public_path('files/' . $filename);

            // Periksa apakah file ada
            if (file_exists($filePath)) {
                // Tentukan nama file yang akan digunakan saat diunduh
                $newFileName = 'CV-Muhammad Risky Farhan.' . pathinfo($filename, PATHINFO_EXTENSION);

                // Kembalikan response untuk mendownload file dengan nama baru
                return response()->download($filePath, $newFileName);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mendownload file: ' . $e->getMessage());
        }
    }


    // public function tambahGambarProjek(Request $request, $idProjek)
    // {
    //     // Validasi input gambar
    //     $request->validate([
    //         'gambar_carousel' => 'required|array', // Pastikan ada array gambar
    //         'gambar_carousel.*' => 'image', // Validasi setiap file adalah gambar
    //     ]);

    //     // Cari detail proyek berdasarkan idProjek
    //     $detailProjek = projek::find($idProjek); // Ganti 'detailProjek' dengan nama model yang sesuai

    //     // Cek apakah data proyek ditemukan
    //     if (!$detailProjek) {
    //         return redirect()->back()->with('error', 'Proyek tidak ditemukan!');
    //     }

    //     // Loop untuk setiap file gambar yang diunggah
    //     if ($request->hasFile('gambar_carousel')) {
    //         // Ambil semua gambar yang diupload
    //         foreach ($request->file('gambar_carousel') as $file) {
    //             // Membuat nama file gambar yang unik dengan timestamp
    //             $gambarName = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());

    //             // Pindahkan file gambar ke folder 'public/images'
    //             $path = $file->move(public_path('images'), $gambarName);

    //             // Simpan data gambar ke tabel projekGambar
    //             $projekGambar = new gambarProjek();
    //             $projekGambar->gambar = 'images/' . $gambarName; // Simpan path relatif ke database
    //             $projekGambar->idProjek = $idProjek; // Menyimpan idProjek yang didapatkan
    //             $projekGambar->save(); // Simpan data gambar ke tabel projekGambar
    //         }
    //     } else {
    //         // Jika tidak ada gambar yang diupload
    //         return redirect()->back()->with('error', 'Gambar proyek harus diupload!');
    //     }

    //     // Redirect dengan pesan sukses
    //     return redirect()->route('projek.show', $idProjek)->with('success', 'Gambar berhasil ditambahkan!');
    // }


    

}









