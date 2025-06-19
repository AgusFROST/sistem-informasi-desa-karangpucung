<div class="px-5">
    <div class="footer-head rounded-top">
        <div class="row">
            <div class="col-lg-4 my-4 px-4">
                <div class="d-flex mb-3 text-white">
                    <div class="p-2">
                        <?php $icon = App\Models\icon::first(); ?>

                        <img src="{{ asset('storage/' . $icon->img) }}" class="img-fluid" width="75%">
                    </div>
                    <div class="p-2">
                        <h5 class="fw-bold">Desa Karangpucung</h5>
                        <h6 class="fw-bold">
                            <span>Kecamatan Karangpucung</span>
                            <span> Kabupaten Cilacap</span>
                            <br><span>Provinsi Jawa Tengah</span>
                        </h6>
                    </div>
                </div>
                </span>
            </div>
            <div class="col-lg-4 my-4 px-4">
                <div class="d-flex mb-3">
                    <?php $kontak = App\Models\KontakDesa::first(); ?>
                    <div class="p-2">
                        <h5 class="fw-bold text-white">Kontak Desa</h5>
                        <h6 class="fw-bold">
                            <ul class=" list-unstyled">
                                <li>
                                    <div class="d-flex">
                                        <div class="p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                            </svg>
                                        </div>
                                        <div class="p-2">
                                            {{ $kontak->no_telp ?? '-' }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                            </svg>
                                        </div>
                                        <div class="p-2">
                                            {{ $kontak->email ?? '-' }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                            </svg>
                                        </div>
                                        <div class="p-2">
                                            {{ $kontak->waktu ?? '-' }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                                            </svg>
                                        </div>
                                        <div class="p-2">
                                            {{ $kontak->alamat ?? '-' }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </h6>
                    </div>
                </div>
                </span>
            </div>
            <div class="col-lg-4 my-4 px-4">
                <div class="d-flex mb-3">
                    <div class="p-2">
                        <h5 class="fw-bold text-white">Media Sosial</h5>
                        <h6 class="fw-bold">
                            <ul class="list-unstyled">
                                @php
                                $mediaSosial = App\Models\MediaSosial::with('medsosSvg')->get();

                                @endphp

                                @foreach ($mediaSosial as $item)
                                <li>
                                    <div class="d-flex">
                                        <div class="p-2">
                                            {!! $item->medsosSvg->svg !!}
                                        </div>
                                        <div class="p-2">
                                            <a href="{{ $item->url }}" class="link-dark">
                                                {{ $item->medsosSvg->name }}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                        </h6>
                    </div>
                </div>
                </span>
            </div>
        </div>
    </div>
    <div class="footer-foot bg-danger text-center text-white">
        © 2025 Powered by Pemerintahan Desa Karangpucung
    </div>
</div>
