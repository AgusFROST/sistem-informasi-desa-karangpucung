<?php

namespace App\Http\Controllers;

use App\Models\Idm;
use App\Models\Icon;
use App\Models\Sdgs;
use App\Models\Umur;
use App\Models\Agama;
use App\Models\Apbdes;
use App\Models\Bansos;
use App\Models\Carausel;
use App\Models\Sambutan;
use App\Models\SdgsSkor;
use App\Models\VisiMisi;
use App\Models\IdmStatus;
use App\Models\Pekerjaan;
use App\Models\KontakDesa;
use App\Models\Organisasi;
use App\Models\Pendidikan;
use App\Models\AdmPenduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardUIController extends Controller
{
    public function icon()
    {
        $icon = Icon::first(); // Mengambil icon pertama (atau bisa diatur sesuai kebutuhan)
        return view('dashboard.ui.icon', [
            'title' => 'Update Icon',
            'icon' => $icon,
        ]);
    }

    public function updateIcon(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $icon = Icon::first();

        // Path folder publik
        $publicPath = public_path('storage/icon');

        // Buat folder 'icon' di dalam public/storage jika belum ada
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true, true);
        }

        // Hapus file lama jika ada
        if ($icon && $icon->img && File::exists(public_path($icon->img))) {
            File::delete(public_path($icon->img));
        }

        // Simpan file ke public/storage/icon
        $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
        $path = 'icon/' . $fileName;
        $request->file('img')->move($publicPath, $fileName);

        // Update atau buat data di database
        if ($icon) {
            $icon->update(['img' => $path]);
        } else {
            Icon::create(['img' => $path]);
        }

        return redirect('/dashboard/ui/icon')->with('success', 'Icon berhasil diperbarui!');
    }

    public function kontakDesa()
    {
        $kontak = KontakDesa::first(); // Mengambil data pertama dari tabel
        return view('dashboard.ui.footer.kontak-desa', [
            'title' => 'Update Kontak Desa',
            'kontak' => $kontak
        ]);
    }

    public function updateKontakDesa(Request $request)
    {
        $request->validate([
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'waktu' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $kontak = KontakDesa::first();

        if ($kontak) {
            // Update jika data sudah ada
            $kontak->update($request->all());
        } else {
            // Buat baru jika data belum ada
            KontakDesa::create($request->all());
        }

        return redirect('/dashboard/ui/footer/kontak-desa')->with('success', 'Kontak desa berhasil diperbarui!');
    }


    public function indexCarausel()
    {
        $carausels = Carausel::all();
        return view('dashboard.ui.carausel.index', ['carausels' => $carausels, 'title' => 'Manage Carausel']);
    }

    public function createCarausel()
    {
        return view('dashboard.ui.carausel.create', [
            'title' => 'Add Carausel'
        ]);
    }

    public function storeCarausel(Request $request)
    {
        $request->validate(['img' => 'required|image|mimes:jpg,jpeg,png|max:10240']);

        // Menyimpan gambar ke folder 'carausel' di disk 'public'
        $filePath = $request->file('img')->store('carausel', 'public');

        // Menyimpan informasi gambar ke database
        Carausel::create(['img' => $filePath]);

        return redirect('/dashboard/ui/carausel')->with('success', 'Carausel added successfully!');
    }

    public function editCarausel(Carausel $carausel)
    {
        return view('dashboard.ui.carausel.edit', [
            'carausel' => $carausel,
            'title' => 'Edit Carausel'
        ]);
    }

    public function updateCarausel(Request $request, Carausel $carausel)
    {
        $request->validate(['img' => 'nullable|image|mimes:jpg,jpeg,png|max:10240']);

        if ($request->hasFile('img')) {
            // Menghapus gambar lama jika ada
            if (Storage::exists('public/' . $carausel->img)) {
                Storage::delete('public/' . $carausel->img);
            }

            // Menyimpan gambar baru ke folder 'carausel' di disk 'public'
            $filePath = $request->file('img')->store('carausel', 'public');

            // Memperbarui data gambar di database
            $carausel->update(['img' => $filePath]);
        }

        return redirect('/dashboard/ui/carausel')->with('success', 'Carausel updated successfully!');
    }

    public function deleteCarausel(Carausel $carausel)
    {
        // Menghapus gambar dari storage
        if (Storage::exists('public/' . $carausel->img)) {
            Storage::delete('public/' . $carausel->img);
        }

        // Menghapus data dari database
        $carausel->delete();

        return redirect('/dashboard/ui/carausel')->with('success', 'Carausel deleted successfully!');
    }

    public function sambutan()
    {
        $sambutan = Sambutan::first(); // Ambil data sambutan pertama (jika ada)
        return view('dashboard.ui.sambutan', [
            'title' => 'Update Sambutan',
            'sambutan' => $sambutan,
        ]);
    }

    public function updateSambutan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $sambutan = Sambutan::first();

        if ($sambutan) {
            $sambutan->update($request->only('name', 'body'));
        } else {
            Sambutan::create($request->only('name', 'body'));
        }

        return redirect()->route('dashboard.ui.sambutan')->with('success', 'Sambutan berhasil diperbarui!');
    }

    public function editAdmPenduduk()
    {
        // Ambil data pertama dari tabel
        $admPenduduk = AdmPenduduk::first();

        return view('dashboard.ui.infografis.admPenduduk.adm', [
            'title' => 'Administrasi Penduduk',
            'admPenduduk' => $admPenduduk,
        ]);
    }

    public function updateAdmPenduduk(Request $request)
    {


        $request->validate([
            'kepala_keluarga' => 'nullable',
            'laki_laki' => 'nullable',
            'perempuan' => 'nullable',
            'penduduk_sementara' => 'nullable',
            'mutasi_penduduk' => 'nullable',
            'belum_menikah' => 'nullable',
            'menikah' => 'nullable',
            'cerai_hidup' => 'nullable',
            'cerai_mati' => 'nullable',
        ]);

        // Hitung jumlah penduduk (laki-laki + perempuan)
        $jumlahPenduduk = ($request->laki_laki ?? 0) + ($request->perempuan ?? 0);

        // Update atau buat baru jika belum ada
        AdmPenduduk::updateOrCreate([], [
            'kepala_keluarga' => $request->kepala_keluarga ?? 0,
            'laki_laki' => $request->laki_laki ?? 0,
            'perempuan' => $request->perempuan ?? 0,
            'penduduk' => $jumlahPenduduk,
            'penduduk_sementara' => $request->penduduk_sementara ?? 0,
            'mutasi_penduduk' => $request->mutasi_penduduk ?? 0,
            'belum_menikah' => $request->belum_menikah ?? 0,
            'menikah' => $request->menikah ?? 0,
            'cerai_hidup' => $request->cerai_hidup ?? 0,
            'cerai_mati' => $request->cerai_mati ?? 0,
        ]);

        return redirect()->route('adm.penduduk.edit')->with('success', 'Data berhasil diperbarui!');
    }




    public function sdgsIndex()
    {
        $sdgs = Sdgs::with('SdgsImg')->get(); // Mengambil semua data SDGs beserta relasi gambar
        $sdgsSkor = SdgsSkor::first(); // Ambil skor pertama (jika ada)

        return view('dashboard.ui.infografis.sdgs', [
            'title' => 'SDGs',
            'sdgs' => $sdgs,
            'sdgsSkor' => $sdgsSkor
        ]);
    }

    // Memproses update SDGs
    public function sdgsUpdate(Request $request)
    {
        // Validasi input
        $request->validate([
            'sdgs.*.id' => 'required|exists:sdgs,id',
            'sdgs.*.nilai' => 'required|string',
            'sdgs_skor' => 'nullable|string', // Tambahkan validasi untuk SdgsSkor
        ]);

        foreach ($request->sdgs as $data) {
            Sdgs::where('id', $data['id'])->update([
                'nilai' => $data['nilai']
            ]);
        }

        // Perbarui atau buat data di tabel SdgsSkor
        if ($request->filled('sdgs_skor')) {
            SdgsSkor::updateOrCreate([], ['nilai' => $request->sdgs_skor]);
        }

        return redirect()->route('sdgs.index')->with('success', 'Data SDGs berhasil diperbarui.');
    }

    public function editIdm()
    {
        $idm = Idm::first() ?? new Idm(); // Jika kosong, buat instance baru agar tidak error

        return view('dashboard.ui.infografis.idm', [
            'title' => 'IDM',
            'idm' => $idm,
            'statuses' => IdmStatus::all()
        ]);
    }

    public function updateIdm(Request $request)
    {
        $request->validate([
            'idm_status_id' => 'required|exists:idm_status,id',
            'nilai' => 'required|string',
            'tahun' => 'required|date_format:Y',
        ]);

        $idm = Idm::first();
        if ($idm) {
            $idm->update($request->all());
        } else {
            Idm::create($request->all()); // Jika belum ada, buat baru
        }

        return redirect()->route('idm.edit')->with('success', 'IDM berhasil diperbarui');
    }


    public function indexBansos()
    {
        $bansos = Bansos::all();
        return view('dashboard.ui.infografis.bansos.bansos', [
            'title' => 'Data Bansos',
            'bansos' => $bansos
        ]);
    }

    public function createBansos()
    {
        return view('dashboard.ui.infografis.bansos.create', [
            'title' => 'Tambah Bansos'
        ]);
    }

    public function storeBansos(Request $request)
    {
        $request->validate([
            'nama_bansos' => 'required',
            'jumlah' => 'required|integer'
        ]);

        Bansos::create($request->all());

        return redirect('/dashboard/ui/bansos')->with('success', 'Bansos berhasil ditambahkan!');
    }

    public function editBansos($id)
    {
        $bansos = Bansos::findOrFail($id);
        return view('dashboard.ui.infografis.bansos.edit', [
            'title' => 'Edit Bansos',
            'bansos' => $bansos
        ]);
    }

    public function updateBansos(Request $request, $id)
    {
        $request->validate([
            'nama_bansos' => 'required',
            'jumlah' => 'required|integer'
        ]);

        Bansos::where('id', $id)->update($request->only(['nama_bansos', 'jumlah']));

        return redirect('/dashboard/ui/bansos')->with('success', 'Bansos berhasil diperbarui!');
    }

    public function destroyBansos($id)
    {
        Bansos::destroy($id);
        return redirect('/dashboard/ui/bansos')->with('success', 'Bansos berhasil dihapus!');
    }

    public function editUmur()
    {
        $title = 'Update Data Umur';
        $data = Umur::with(['rentangUmur', 'gender'])->get();
        return view('dashboard.ui.infografis.admPenduduk.umur', compact('title', 'data'));
    }

    public function updateUmur(Request $request)
    {
        foreach ($request->jumlah as $id => $jumlah) {
            Umur::where('id', $id)->update(['jumlah' => $jumlah]);
        }

        return redirect()->back()->with('success', 'Data umur berhasil diperbarui.');
    }

    public function pendidikan()
    {
        // Ambil semua data pendidikan untuk ditampilkan
        $pendidikan = Pendidikan::all();

        return view('dashboard.ui.infografis.admPenduduk.pendidikan', [
            'title' => 'Pendidikan Penduduk',
            'pendidikan' => $pendidikan
        ]);
    }

    public function updatePendidikan(Request $request)
    {
        // Validasi input
        $request->validate([
            'jumlah' => 'required|array', // Validasi untuk memastikan jumlah berupa array
            'jumlah.*' => 'required|integer', // Setiap elemen dalam array harus integer
        ]);

        // Update data pendidikan berdasarkan ID
        foreach ($request->jumlah as $id => $jumlah) {
            $pendidikan = Pendidikan::findOrFail($id);
            $pendidikan->update(['jumlah' => $jumlah]);
        }

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect('/dashboard/ui/administrasi-penduduk/pendidikan')->with('success', 'Data pendidikan berhasil diperbarui');
    }

    public function editPekerjaan()
    {
        $pekerjaan = Pekerjaan::all();
        return view('dashboard.ui.infografis.admPenduduk.pekerjaan', [
            'title' => 'Update Pekerjaan',
            'pekerjaan' => $pekerjaan
        ]);
    }

    public function updatePekerjaan(Request $request)
    {
        $request->validate([
            'pekerjaan.*.id' => 'required|exists:pekerjaan,id',
            'pekerjaan.*.jumlah' => 'required|integer|min:0',
        ]);

        foreach ($request->pekerjaan as $data) {
            Pekerjaan::where('id', $data['id'])->update(['jumlah' => $data['jumlah']]);
        }

        return redirect()->back()->with('success', 'Data pekerjaan berhasil diperbarui.');
    }

    public function editAgama()
    {
        return view('dashboard.ui.infografis.admPenduduk.agama', [
            'title' => 'Update Data Agama',
            'agamas' => Agama::all()
        ]);
    }

    public function updateAgama(Request $request)
    {
        $request->validate([
            'agama.*.id' => 'required|exists:agama,id',
            'agama.*.jumlah' => 'required|integer|min:0',
        ]);

        foreach ($request->agama as $data) {
            Agama::where('id', $data['id'])->update(['jumlah' => $data['jumlah']]);
        }

        return redirect()->back()->with('success', 'Data agama berhasil diperbarui.');
    }

    public function indexStruktur()
    {
        $data = StrukturOrganisasi::all();
        return view('dashboard.ui.struktur-organisasi.index', [
            'title' => 'Struktur Organisasi',
            'data' => $data
        ]);
    }

    public function createStruktur()
    {
        return view('dashboard.ui.struktur-organisasi.create', [
            'title' => 'Tambah Struktur Organisasi'
        ]);
    }

    public function storeStruktur(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:struktur_organisasi,name'
        ]);

        StrukturOrganisasi::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('struktur.index')->with('success', 'Struktur Organisasi berhasil ditambahkan');
    }

    public function editStruktur($slug)
    {
        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        return view('dashboard.ui.struktur-organisasi.edit', [
            'title' => 'Edit Struktur Organisasi',
            'struktur' => $struktur
        ]);
    }

    public function updateStruktur(Request $request, $slug)
    {
        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        $request->validate([
            'name' => 'required|unique:struktur_organisasi,name,' . $struktur->id
        ]);

        $struktur->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('struktur.index')->with('success', 'Struktur Organisasi berhasil diperbarui');
    }

    public function destroyStruktur($slug)
    {
        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        $struktur->delete();

        return redirect()->route('struktur.index')->with('success', 'Struktur Organisasi berhasil dihapus');
    }

    public function indexOrganisasi($slug)
    {
        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        $data = Organisasi::where('struktur_organisasi_id', $struktur->id)->get();

        return view('dashboard.ui.struktur-organisasi.organisasi.organisasi', [
            'title' => 'Organisasi - ' . $struktur->name,
            'data' => $data,
            'struktur' => $struktur
        ]);
    }

    public function createOrganisasi($slug)
    {
        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        return view('dashboard.ui.struktur-organisasi.organisasi.create', [
            'title' => 'Tambah Anggota Organisasi',
            'struktur' => $struktur
        ]);
    }

    public function storeOrganisasi(Request $request, $slug)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:10240'
        ]);

        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();

        // Cek apakah ada file gambar
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('organisasi', 'public');
        }

        Organisasi::create([
            'struktur_organisasi_id' => $struktur->id,
            'nama' => $request->nama,
            'img' => $imgPath, // Bisa null jika tidak diunggah
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('organisasi.index', $slug)->with('success', 'Data berhasil ditambahkan!');
    }


    public function editOrganisasi($slug, $id)
    {
        $struktur = StrukturOrganisasi::where('slug', $slug)->firstOrFail();
        $organisasi = Organisasi::findOrFail($id);

        return view('dashboard.ui.struktur-organisasi.organisasi.edit', [
            'title' => 'Edit Anggota',
            'struktur' => $struktur,
            'organisasi' => $organisasi
        ]);
    }

    public function updateOrganisasi(Request $request, $slug, $id)
    {
        $organisasi = Organisasi::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        if ($request->hasFile('img')) {
            if ($organisasi->img) {
                Storage::disk('public')->delete($organisasi->img);
            }
            $organisasi->img = $request->file('img')->store('organisasi', 'public');
        }

        $organisasi->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'img' => $organisasi->img
        ]);

        return redirect()->route('organisasi.index', $slug)->with('success', 'Data berhasil diperbarui');
    }

    public function destroyOrganisasi($slug, $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        if ($organisasi->img) {
            Storage::disk('public')->delete($organisasi->img);
        }
        $organisasi->delete();

        return redirect()->route('organisasi.index', $slug)->with('success', 'Data berhasil dihapus');
    }



    public function editVisiMisi()
    {
        $visiMisi = VisiMisi::first();
        return view('dashboard.ui.visi-misi', compact('visiMisi'))->with('title', 'Update Visi Misi');
    }

    public function updateVisiMisi(Request $request)
    {
        // Ambil data pertama dari tabel visi_misi
        $visiMisi = VisiMisi::first();

        // Jika data tidak ada, buat data baru
        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
        }

        // Update data visi dan misi
        $visiMisi->visi = $request->visi;
        $visiMisi->misi = $request->misi;
        $visiMisi->save();

        return redirect()->back()->with('success', 'Visi dan Misi berhasil diperbarui!');
    }


    public function editApbdes()
    {
        $apbdes = Apbdes::first();
        return view('dashboard.ui.infografis.admPenduduk.apbdes', [
            'title' => 'Update APBDes',
            'apbdes' => $apbdes
        ]);
    }

    public function updateApbdes(Request $request)
    {
        $request->validate([
            'pendapatan' => 'required|numeric',
            'belanja' => 'required|numeric'
        ]);

        $apbdes = Apbdes::first();

        if ($apbdes) {
            // Update data jika sudah ada
            $apbdes->update($request->only(['pendapatan', 'belanja']));
        } else {
            // Buat data baru jika belum ada
            Apbdes::create($request->only(['pendapatan', 'belanja']));
        }

        return redirect()->back()->with('success', 'APBDes berhasil diperbarui');
    }
}
