@include('Hf.header')
    <!-- halaman utama -->
    <div class="container" id="halaman-utama-admin">
        <div class="row mb-5">
            <div class="col-12 col-md-6 align-self-center" data-aos="zoom-in">
                <h5>Selamat datang! saya</h5>
                <h1>Muhammad Risky Farhan</h1>
                <p class="py-2 opacity-50" style="line-height: 1.8;">Saya seorang mahasiswa jurusan rekayasa perangkat lunak <br>Ayo telusuri pengalaman proyek dan pencapaian saya</p>
                @foreach($files as $file)
                    <button type="button" class="btn btn-outline-primary border-2" href="{{ route('files.download', ['filename' => $file->CV_name]) }}">Download cv</button>
                @endforeach
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center" data-aos="zoom-in">
                <img src="{{ asset('Gambar/gambarorang.png') }}"  height="500px" alt="">
            </div>
        </div>
    </div>

    <!-- keahlian -->
    <div class="p-3 mb-2 bg-body-tertiary" id="halaman-keahlian-admin">
        <div class="container">
            <div class="row py-5">
                <div class="row">
                    <div class="col-8">
                        <p class="pb-5" style="font-size:25px" data-aos="fade-right">Keahlian</p>
                    </div>
                    <div class="col-4 text-end" data-aos="fade-left">
                        <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahKeahlianModal">Tambah Keahlian</a>
                    </div>
                </div>
                @foreach($keahlian as $item)
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center" data-aos="zoom-in">
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" data-type="keahlian" style="position: absolute; top: 10px; right: 30px;z-index:1000">
                        <i class="bi bi-trash"></i>
                    </button>
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
    <div class="container" id="halaman-projek-admin">
        <div class="row py-5">
            <div class="row">
                    <div class="col-8">
                        <p class="pb-5" style="font-size:25px" data-aos="fade-right">Projek</p>
                    </div>
                    <div class="col-4 text-end" data-aos="fade-left">
                        <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahProjekModal">Tambah Projek</a>
                    </div>
                </div>
            <div id="carouselExampleRide" class="carousel carousel-dark slide pb-2 rounded-5" data-bs-ride="carousel" data-aos="zoom-in">
                <div class="carousel-inner">
                    @foreach($projek as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                            <a href="{{ route('project.detail', $item->id) }}">
                                <img src="{{ asset($item->gambar_flyer) }}" class="d-block w-100 rounded" alt="{{ $item->title_1 }}" style="width: 100%; height: 400px; object-fit: cover;">
                            </a>
                            
                            <!-- Formulir untuk menghapus projek -->
                            <form action="{{ route('hapusProjek', $item->id) }}" method="POST" class="position-absolute top-0 end-0 p-3" style="z-index: 1000;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
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
    <div class="p-3 mb-2 bg-body-tertiary" id="halaman-sertifikat-admin">
        <div class="container">
            <div class="row py-5">
                <div class="row">
                    <div class="col-8">
                        <p class="pb-5" style="font-size:25px" data-aos="fade-right">Sertifikat</p>
                    </div>
                    <div class="col-4 text-end" data-aos="fade-left">
                        <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahSertifikatModal">Tambah Sertifikat</a>
                    </div>
                </div>
                @foreach ($sertifikat as $item)
                    <div class="col-md-4 d-flex align-items-center justify-content-center py-3" data-aos="zoom-in">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="{{ $item->id }}" data-type="sertifikat" style="position: absolute; top: 10px; right: 30px;z-index:1000;">
                            <i class="bi bi-trash"></i>
                        </button>
                        <div class="card h-100" style="width: 18rem;">
                            <img src="{{ asset($item->gambar_1) }}" class="card-img-top" alt="Tidak terbaca" style="max-height: 15rem; object-fit: cover;">
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


    <!-- Modal Keahlian -->
    <div class="modal fade" id="tambahKeahlianModal" tabindex="-1" aria-labelledby="tambahKeahlianModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKeahlianModalLabel">Tambah Keahlian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambahKeahlian') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_keahlian" class="form-label">Skill apa nih yang baru</label>
                            <input type="text" class="form-control" id="nama_keahlian" name="nama_keahlian" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Coba jelasin dikit dong</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Skillnya bentuk apa sih?</label>
                            <input type="text" class="form-control" id="icon" name="icon" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Keahlian</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- modal projek -->
    <div class="modal fade" id="tambahProjekModal" tabindex="-1" aria-labelledby="tambahProjekModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProjekModalLabel">Tambah Projek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambahProjek') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Gambar Flyer -->
                        <div class="mb-3">
                            <label for="gambar_flyer" class="form-label">Gambar Spanduknya</label>
                            <input type="file" class="form-control" id="gambar_flyer" name="gambar_flyer" required>
                            @error('gambar_flyer')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title 1 (Perusahaan) -->
                        <div class="mb-3">
                            <label for="title_1" class="form-label">Perusahaan mana yang buat projek?</label>
                            <input type="text" class="form-control" id="title_1" name="title_1" required>
                            @error('title_1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title 2 (Nama Web) -->
                        <div class="mb-3">
                            <label for="title_2" class="form-label">Dikasi nama apa tuh projeknya?</label>
                            <input type="text" class="form-control" id="title_2" name="title_2" required>
                            @error('title_2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Desk 1 -->
                        <div class="mb-3">
                            <label for="desk_1" class="form-label">Jelasin singkat dong tentang projeknya</label>
                            <textarea class="form-control" id="desk_1" name="desk_1" rows="3" required></textarea>
                            @error('desk_1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar 1 -->
                        <div class="mb-3">
                            <label for="gambar_1" class="form-label">Coba tambahin gambar produknya disini</label>
                            <input type="file" class="form-control" id="gambar_1" name="gambar_1" required>
                            @error('gambar_1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Desk 2 -->
                        <div class="mb-3">
                            <label for="desk_2" class="form-label">Make tools apa aja sih?</label>
                            <textarea class="form-control" id="desk_2" name="desk_2" rows="3" required></textarea>
                            @error('desk_2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Desk 3 -->
                        <div class="mb-3">
                            <label for="desk_3" class="form-label">Kebagian ngerjain bagian apa nih?</label>
                            <textarea class="form-control" id="desk_3" name="desk_3" rows="3" required></textarea>
                            @error('desk_3')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Projek</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal sertifikat -->
    <div class="modal fade" id="tambahSertifikatModal" tabindex="-1" aria-labelledby="tambahSertifikatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSertifikatModalLabel">Tambah Keahlian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambahSertifikat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="gambar_1" class="form-label">Gambar Sertifikat</label>
                            <input type="file" class="form-control" id="gambar_1" name="gambar_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <textarea class="form-control" id="title" name="title" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah sertifikat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload CV -->
    <!-- <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->


    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="formDelete" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Button mengambang -->
    <button type="button" class="btn btn-primary btn-lg position-fixed bottom-0  end-0 m-5" data-bs-toggle="modal" data-bs-target="#editModal">
    <i class="bi bi-pencil"></i> <!-- Ikon pensil -->
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Pilihan untuk memilih apa yang ingin diedit -->
                    <form method="POST" action="{{ route('files.update') }}" enctype="multipart/form-data" id="editProjectForm">
                        @csrf
                        @method('PUT')
                        <!-- Pilihan antara Edit Project atau Add Carousel Images -->
                        <div class="mb-3">
                            <label class="form-label">Mau ngedit apa nambah gambar min?</label>
                            <div>
                                <input type="radio" class="btn-check" name="edit_cv" id="edit_cv" value="cv" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="edit_cv">cv</label>
                                
                                <input type="radio" class="btn-check" name="edit_gambarUtama" id="add_gambarUtama" value="carousel" autocomplete="off">
                                <label class="btn btn-outline-primary" for="add_gambarUtama">gambar utama</label>

                                <input type="radio" class="btn-check" name="edit_gambarTentang" id="add_gambarTentang" value="icon" autocomplete="off">
                                <label class="btn btn-outline-primary" for="add_gambarTentang">gambar tentang saya</label>
                            </div>
                        </div>

                        <!-- Form Edit Project -->
                        <div id="editCV">
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload disini cv barunya bentuk PF atau PNG aja ya</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                        </div>

                        <!-- Form tambah Images -->
                        <div id="addGambarUtama" style="display:none">
                            <div class="mb-3">
                                <label for="fileGambarUtama" class="form-label">Upload disini gambar utama barunya disini</label>
                                <input type="file" class="form-control" id="fileGambarUtama" name="fileGambarUtama" required>
                            </div>
                        </div>

                        <!-- Form tambah Icon -->
                        <div id="addGambarTentang" style="display:none">
                            <div class="mb-3">
                                <label for="fileGambarTentang" class="form-label">Upload disini gambar tentang barunya disini</label>
                                <input type="file" class="form-control" id="fileGambarTentang" name="fileGambarTentang" required>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary" id="editProjectSubmit">Udah ni updatin dong</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        setTimeout(function() {
            sessionStorage.removeItem('logout');
        }, 1);


        document.getElementById('edit_cv').addEventListener('change', function() {
        document.getElementById('editCV').style.display = 'block';
        document.getElementById('editGambarUtama').style.display = 'none';
        document.getElementById('editGambarTentang').style.display = 'none';
        });

        document.getElementById('add_gambarUtama').addEventListener('change', function() {
            document.getElementById('editCV').style.display = 'none';
            document.getElementById('editGambarUtama').style.display = 'block';
            document.getElementById('editGambarTentang').style.display = 'none';
        });

        document.getElementById('add_gambarTentang').addEventListener('change', function() {
            document.getElementById('editCV').style.display = 'none';
            document.getElementById('editGambarUtama').style.display = 'none';
            document.getElementById('editGambarTentang').style.display = 'block';
        });




        // Menangani pengaturan ID dan tipe untuk penghapusan
        var deleteModal = document.getElementById('hapusModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Tombol yang memicu modal
            var entityId = button.getAttribute('data-id'); // Ambil ID entitas
            var entityType = button.getAttribute('data-type'); // Ambil jenis entitas ('sertifikat' atau 'keahlian')
            
            // Tentukan URL form penghapusan berdasarkan jenis entitas
            var formAction = '';
            if (entityType === 'keahlian') {
                formAction = '{{ route("hapusKeahlian", ":id") }}'.replace(':id', entityId);
            } else if (entityType === 'sertifikat') {
                formAction = '{{ route("hapusSertifikat", ":id") }}'.replace(':id', entityId);
            }

            console.log('Form action:', formAction);
            
            // Perbarui URL form penghapusan
            var formDelete = document.getElementById('formDelete');
            formDelete.action = formAction;
        });


        // Menampilkan SweetAlert jika ada session success
        @if (session('success'))
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        @endif

        // Menampilkan SweetAlert jika ada session gagal
        @if (session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        @endif
    </script>
    
</body>
</html>