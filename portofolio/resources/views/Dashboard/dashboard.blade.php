@include('Hf.header')
    
    <!-- halaman utama -->
    <div class="container" id="halaman-utama">
        <div class="row mb-5">
            <div class="col-12 col-md-6 align-self-center" data-aos="zoom-in">
                <h5>Selamat datang! saya</h5>
                <h1>Muhammad Risky Farhan</h1>
                <p class="py-2 opacity-50" style="line-height: 1.8;">Saya seorang mahasiswa jurusan rekayasa perangkat lunak <br>Ayo telusuri pengalaman proyek dan pencapaian saya</p>
                @foreach($files as $file)
                    <a type="button" class="btn btn-outline-primary border-2" href="{{ route('files.download', ['filename' => $file->CV_name]) }}">Download CV</a>
                @endforeach    
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center" data-aos="zoom-in">
                <img src="{{ asset('Gambar/gambarorang.png') }}"  height="500px" alt="">
            </div>
        </div>
    </div>

    <!-- keahlian -->
    <div class="p-3 mb-2 bg-body-tertiary" id="halaman-keahlian">
        <div class="container">
            <div class="row py-5">
                <p class="pb-5 align-self-center text-center text-lg-start" style="font-size:25px" data-aos="fade-right">Keahlian</p>
                @foreach($keahlian as $item)
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center" data-aos="zoom-in">
                    <div class="card border-0 bg-transparent" style="width: 18rem;">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title" style="font-size:60px">
                                <i class="bi {{ $item->icon }}" style="color:blue;"></i>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-body-primary">{{ $item->title }}</h6>
                            <p class="card-text" style="font-size:12px;line-height: 2.0;">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- projek -->
    <div class="container" id="halaman-projek">
        <div class="row py-5">
            <p class="pb-5 align-self-center text-center text-lg-start" style="font-size:25px" data-aos="fade-right">Projek</p>
            <div id="carouselExampleRide" class="carousel carousel-dark slide pb-2 rounded-5" data-bs-ride="carousel" data-aos="zoom-in">
                <div class="carousel-inner">
                    @foreach($projek as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                            <a href="{{ route('project.detail', $item->id) }}"> 
                                <img src="{{ asset($item->gambar_flyer) }}" class="d-block w-100 rounded" alt="{{ $item->title_1 }}" style="width: 100%; height: 400px; object-fit: cover;">
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- sertifikat -->
    <div class="p-3 mb-2 bg-body-tertiary" id="halaman-keahlian">
        <div class="container">
            <div class="row py-5">
                <p class="pb-5 align-self-center text-center text-lg-start" style="font-size:25px" data-aos="fade-right">sertifikat</p>
                @foreach ($sertifikat as $item)
                    <div class="col-md-4 d-flex align-items-center justify-content-center py-3" data-aos="zoom-in">
                        <div class="card h-100" style="width: 18rem;">
                            <img src="{{ asset($item->gambar_1) }}" class="card-img-top" alt="Tidak terbaca" style="max-height: 13rem; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title" style="color:blue;">{{ $item->title }}</h5>
                                <p class="card-text" style="font-size:13px">{{ $item->description }}</p>
                            </div>
                        </div>    
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- tentang saya -->
    <div class="container" id="halaman-tentangSaya">
        <div class="row py-5">
            <p class="pb-3 align-self-center text-center text-lg-start" style="font-size:25px" data-aos="fade-right">Tentang saya</p>
            <div class="col-12 col-md-4 py-5 py-md-0 d-flex justify-content-center" data-aos="zoom-in">
                <img class="rounded img-fluid img-md-200" src="{{ asset('Gambar/saya_bgdanattribut.jpg') }}" alt="">
            </div>

            <div class="col-12 col-md-8 align-self-center text-center text-md-start" data-aos="fade-up">
                <p style="font-size:12px; text-align: justify;">Hai, Perkenalkan nama saya <span style="font-size: 14px; font-weight: bold;">Muhammad Risky Farhan.</span> saya seorang mahasiswa yang masih menempuh pendidikan di <span style="font-size: 14px; font-weight: bold; color:red">Universitas Telkom </span>dengan jurusan <span style="font-size: 14px; font-weight: bold; color:orange">Rekayasa Perangkat Lunak.</span> saya memiliki ketertarikan pada sebuah pengembangan <span style="font-size: 14px; font-weight: bold; color:blue">website</span> terutama pada bagian User Interface. Selain itu, saya juga memiliki pengalaman dalam mengoperasikan <span style="font-size: 14px; font-weight: bold;"> microsoft office </span> seperti Powerpoint, Excel, dan Word. saya memiliki pengalaman dalam menggunakan beberapa tools seperti.</p>
                <img src="{{ asset('Gambar/Bootstrap_logo.png') }}" class="img-fluid pe-4" style="max-width: 100px;" alt="Tidak terbaca">
                <img src="{{ asset('Gambar/Tailwind_CSS_logo.png') }}" class="img-fluid pe-4" style="max-width: 100px;" alt="Tidak terbaca">
                <img src="{{ asset('Gambar/figma.png') }}" class="img-fluid pe-4" style="max-width: 100px;" alt="Tidak terbaca">
                <img src="{{ asset('Gambar/Laravel-Logo.png') }}" class="img-fluid pe-4" style="max-width: 100px;" alt="Tidak terbaca">
                <img src="{{ asset('Gambar/word.png') }}" class="img-fluid pe-4" style="max-width: 100px;" alt="Tidak terbaca">
                <img src="{{ asset('Gambar/excel.png') }}" class="img-fluid pe-4" style="max-width: 60px;" alt="Tidak terbaca">
                <img src="{{ asset('Gambar/ppt.png') }}" class="img-fluid pe-4" style="max-width: 60px;" alt="Tidak terbaca">
                <p style="font-size:12px; text-align: justify; padding-top:15px;"></p>
            </div>
        </div>
    </div>
    @include('Hf.footer')

    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>