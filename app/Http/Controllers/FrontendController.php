<?php

namespace App\Http\Controllers;

use App\Models\Idm;
use App\Models\Icon;
use App\Models\Post;
use App\Models\Rule;
use App\Models\Sdgs;
use App\Models\Umur;
use App\Models\Agama;
use App\Models\Apbdes;
use App\Models\Bansos;
use App\Models\Potensi;
use App\Models\Category;
use App\Models\Sambutan;
use App\Models\SdgsSkor;
use App\Models\VisiMisi;
use App\Models\Pekerjaan;
use App\Models\Pelayanan;
use App\Models\Pendidikan;
use App\Models\AdmPenduduk;
use App\Models\SejarahDesa;
use Illuminate\Support\Str;
use App\Models\RuleCategory;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;


class FrontendController extends Controller
{
    public function index()
    {
        $apbdes = Apbdes::first() ?? (object) ['pendapatan' => 0, 'belanja' => 0];

        return view('home', [
            'title' => '',
            'sambutan' => Sambutan::first(),
            'admp' => AdmPenduduk::all(),
            'posts' => Post::latest()->limit(9)->get(),
            'categories' => Category::limit(3)->get(),
            'apbdes' => $apbdes,
            'description' => 'Website Resmi Desa Karangpucung berisi Pusat informasi pelayanan desa, administrasi, potensi, berita, dan pengumuman resmi.'
        ]);
    }



    public function berita()
    {
        return view('beritas', [
            'title' => 'Berita |',
            'posts' => Post::latest()->paginate(9),
            'description' => 'Berita Desa Karangpucung, Cilacap. Menyajikan berita terkini seputar kegiatan dan program yang mendukung kemajuan Desa Karangpucung.'
        ]);
    }

    public function showPost($slug)
    {
        $posts = Post::latest()->limit(7)->get();
        $post = Post::where('slug', $slug)->firstOrFail();
        $title = 'Berita ' . $post->title;

        // Increment view count
        $post->increment('views');

        $description = 'Baca berita terkini tentang ' . $post->title . ' di Desa Karangpucung, Cilacap.';

        return view('berita', compact('post', 'title', 'posts', 'description'));
    }


    public function categories()
    {
        return view('categories', [
            'title' => 'Potensi Desa |',
            'categories' => Category::paginate(9),
            'description' => 'Jelajahi potensi desa yang mencakup sumber daya alam, budaya, dan pariwisata yang dapat mendukung perkembangan ekonomi dan sosial masyarakat desa. Temukan peluang dan kekuatan lokal untuk kemajuan desa.'
        ]);
    }

    public function potensiDesa(Request $request)
    {
        $categorySlug = $request->query('category');

        // Ambil kategori berdasarkan slug
        $category = Category::where('slug', $categorySlug)->first();

        if (!$category) {
            // Jika kategori tidak ditemukan, redirect atau tampilkan pesan
            abort(404, 'Category not found');
        }

        // Ambil semua potensis berdasarkan kategori
        $potensis = Potensi::where('category_id', $category->id)->latest()->paginate(9)->withQueryString();

        return view('category', [
            'title' => 'Potensi Desa - ' . $category->name,
            'category' => $category,
            'potensis' => $potensis,
            'description' => 'Temukan potensi desa dalam kategori ' . $category->name . ' yang dapat dikembangkan untuk kemajuan desa Anda.'
        ]);
    }

    public function showPotensiDesa($slug)
    {
        // Ambil potensi desa berdasarkan slug
        $potensi = Potensi::where('slug', $slug)->firstOrFail();

        // Update jumlah views
        $potensi->increment('views');

        return view('potensi', [
            'title' => 'Potensi Desa - ' . $potensi->title,
            'potensi' => $potensi,
            'description' => Str::limit($potensi->body, 160)
        ]);
    }


    public function profilDesa()
    {
        return view('profil', [
            'title' => 'Profil Desa |',
            'visimisi' => VisiMisi::first(),
            'icon' => Icon::first(),
            'sejarahDesa' => SejarahDesa::all(),
            'strukturOrganisasi' => StrukturOrganisasi::with('organisasi')->get(),
            'description' => 'Mengungkap sejarah, visi misi, serta potensi ekonomi, sosial, dan budaya dalam pembangunan desa yang berkelanjutan.'
        ]);
    }


    public function penduduk()
    {
        $data = Umur::with('rentangUmur', 'gender')->get();

        $kelompokUmur = [
            '75+',
            '70-74',
            '65-69',
            '60-64',
            '55-59',
            '50-54',
            '45-49',
            '40-44',
            '35-39',
            '30-34',
            '25-29',
            '20-24',
            '15-19',
            '10-14',
            '5-9',
            '0-4'
        ];

        $dataLakiLaki = [];
        $dataPerempuan = [];
        $lakiLakiTertinggi = null;
        $lakiLakiTerendah = null;
        $perempuanTertinggi = null;
        $perempuanTerendah = null;

        foreach ($kelompokUmur as $umur) {
            $laki = $data->where('rentangUmur.usia', $umur)->where('gender.jenis_kelamin', 'Laki - Laki')->first();
            $perempuan = $data->where('rentangUmur.usia', $umur)->where('gender.jenis_kelamin', 'Perempuan')->first();

            // Menambahkan jumlah ke array
            $dataLakiLaki[] = $laki ? $laki->jumlah : 0;
            $dataPerempuan[] = $perempuan ? $perempuan->jumlah : 0;

            // Menentukan umur tertinggi dan terendah
            if ($laki) {
                if ($lakiLakiTertinggi === null || $laki->jumlah > $lakiLakiTertinggi['jumlah']) {
                    $lakiLakiTertinggi = ['umur' => $umur, 'jumlah' => $laki->jumlah];
                }
                if ($lakiLakiTerendah === null || $laki->jumlah < $lakiLakiTerendah['jumlah']) {
                    $lakiLakiTerendah = ['umur' => $umur, 'jumlah' => $laki->jumlah];
                }
            }

            if ($perempuan) {
                if ($perempuanTertinggi === null || $perempuan->jumlah > $perempuanTertinggi['jumlah']) {
                    $perempuanTertinggi = ['umur' => $umur, 'jumlah' => $perempuan->jumlah];
                }
                if ($perempuanTerendah === null || $perempuan->jumlah < $perempuanTerendah['jumlah']) {
                    $perempuanTerendah = ['umur' => $umur, 'jumlah' => $perempuan->jumlah];
                }
            }
        }

        // Ambil data pendidikan dari database
        $pendidikanData = Pendidikan::all(); // Mengambil semua data pendidikan

        // Ambil data pekerjaan dari database
        $pekerjaanData = Pekerjaan::all(); // Mengambil semua data pekerjaan

        // Hitung total jumlah pekerjaan
        $totalPekerjaan = $pekerjaanData->sum('jumlah');

        // Hitung persentase setiap pekerjaan
        foreach ($pekerjaanData as $pekerjaan) {
            $pekerjaan->persentase = $totalPekerjaan > 0 ? ($pekerjaan->jumlah / $totalPekerjaan) * 100 : 0;
        }

        // Agama
        $agamaData = Agama::all();

        return view('infografis.penduduk', [
            'title' => 'Statistik Penduduk |',
            'admp' => AdmPenduduk::all(),
            'agamaData' => $agamaData,
            'kelompokUmur' => $kelompokUmur,
            'dataLakiLaki' => $dataLakiLaki,
            'dataPerempuan' => $dataPerempuan,
            'lakiLakiTertinggi' => $lakiLakiTertinggi,
            'lakiLakiTerendah' => $lakiLakiTerendah,
            'perempuanTertinggi' => $perempuanTertinggi,
            'perempuanTerendah' => $perempuanTerendah,
            'pendidikanData' => $pendidikanData,
            'pekerjaanData' => $pekerjaanData,
            'totalPekerjaan' => $totalPekerjaan,
            'agamaData' => $agamaData,
            'description' => 'Infografis kependudukan Desa Karangpucung, Kecamatan Karangpucung, Kabupaten Cilacap. Menampilkan data jumlah penduduk, struktur umur, gender, pendidikan, pekerjaan, dan aspek demografi lainnya secara visual.'
        ]);
    }

    public function apbdes()
    {
        $apbdes = Apbdes::first() ?? (object) ['belanja' => 0, 'pendapatan' => 0];

        return view('infografis.apbdes', [
            'title' => 'APBDes | ',
            'apbdes' => $apbdes,
            'description' => 'APBDes Desa Karangpucung, Kec. Karangpucung, Kab. Cilacap. Menyajikan rincian anggaran pendapatan dan belanja desa untuk mendukung program pembangunan dan pelayanan masyarakat desa.'
        ]);
    }

    public function bansos()
    {
        $bansos = Bansos::all();
        $total = $bansos->sum('jumlah');

        return view('infografis.bansos', [
            'title' => 'Bantuan Sosial',
            'bansos' => $bansos,
            'total' => $total,
            'description' => 'Program Bansos Desa Karangpucung, Kecamatan Karangpucung, Kabupaten Cilacap. Menyediakan bantuan sosial bagi warga yang membutuhkan sebagai bagian dari upaya kesejahteraan masyarakat.'
        ]);
    }


    public function idm()
    {
        // Ambil data IDM pertama beserta status yang terkait
        $idm = Idm::with('idmStatus')->first();

        return view('infografis.idm', [
            'title' => 'IDM |',
            'idm' => $idm,
            'description' => 'Indeks Desa Membangun (IDM) Desa Karangpucung, Cilacap. Menyajikan evaluasi pembangunan desa melalui indikator pembangunan yang menunjukkan kemajuan dan kesejahteraan desa.'
        ]);
    }


    public function sdgs()
    {
        $sdgs = Sdgs::with('SdgsImg')->get();
        $sdgsSkor = SdgsSkor::first();
        return view('infografis.sdgs', [
            'title' => 'SDGs |',
            'description' => 'SDGs Desa Karangpucung, Cilacap. Mewujudkan tujuan pembangunan berkelanjutan untuk meningkatkan kualitas hidup, ekonomi, dan lingkungan di Desa Karangpucung.',
            'sdgs' => $sdgs,
            'sdgsSkor' => $sdgsSkor
        ]);
    }


    public function indexPelayanan()
    {
        $pelayanans = Pelayanan::all();
        $title = 'Pelayanan Desa';
        $description = 'Pelayanan Desa menyediakan berbagai layanan publik untuk mempermudah masyarakat dalam mengakses berbagai informasi dan kebutuhan administratif. Temukan layanan yang Anda butuhkan di sini.
        ';
        return view('pelayanan.services', compact('pelayanans', 'title', 'description'));
    }

    public function showPelayanan($slug)
    {
        $pelayanan = Pelayanan::where('slug', $slug)->firstOrFail();
        $title = 'Pelayanan ' . $pelayanan->name;
        $description = 'Pelayanan ' . $pelayanan->name . ' di Desa Karangpucung, Cilacap. Menyediakan informasi dan layanan publik untuk mempermudah masyarakat dalam mengakses berbagai kebutuhan administratif.';

        return view('pelayanan.detail', compact('pelayanan', 'title', 'description'));
    }


    public function rulesIndex()
    {
        $categories = RuleCategory::with('rules')->get(); // Mengambil semua kategori beserta aturan terkait
        $title = 'Peraturan Desa';
        $description = 'Temukan berbagai peraturan desa yang berlaku di wilayah kami. Informasi lengkap tentang aturan, kebijakan, dan perundang-undangan yang mengatur kehidupan masyarakat desa.';
        return view('peraturan.rules', compact('categories', 'title', 'description'));
    }

    public function showRule($slug)
    {
        $rule = Rule::where('slug', $slug)->firstOrFail();
        $title = 'Peraturan ' . $rule->name;
        $description = 'Baca Peraturan: ' . $rule->name . 'Temukan informasi lengkap mengenai peraturan desa yang berlaku di wilayah kami.';
        return view('peraturan.show', compact('rule', 'title', 'description'));
    }
}
