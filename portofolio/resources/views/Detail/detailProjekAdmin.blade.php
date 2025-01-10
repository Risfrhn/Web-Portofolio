@include('Hf.header')

<!-- gambar spanduk -->
<div class="container-fluid" data-aos="zoom-in">
    <img src="{{ asset($projek->gambar_flyer) }}" class="d-block w-100 rounded" alt="Gambar tidak terbaca" style="width: 100%; height: 500px; object-fit: cover;">
</div>

<!-- section 1 -->
<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-6 align-self-center" data-aos="fade-right">
            <h5>{{ $projek->title_1 }}</h5>
            <h1>{{ $projek->title_2 }}</h1>
            <p class="py-2 opacity-50" style="line-height: 1.8;">{{ $projek->desk_1 }}</p>
        </div>
        <div class="col-12 col-md-6 py-5 d-flex justify-content-center" data-aos="zoom-in">
            <img src="{{ asset($projek->gambar_1) }}"  style="max-width: 100%; max-height: 500px; width: auto; height: auto;" alt="">
        </div>
    </div>
</div>

<!-- section 2 -->
<div class="p-3 mb-2 bg-body-tertiary">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 col-md-6 d-flex justify-content-center" data-aos="zoom-in">
                <div class="row my-auto">
                    @php
                        $gambarCount = 0; // Menghitung jumlah gambar yang ada
                        // Hitung jumlah gambar icon yang ada
                        foreach(range(1, 5) as $index) {
                            if (!empty($projek->{'gambarIcon_' . $index})) {
                                $gambarCount++;
                            }
                        }
                    @endphp
                    @foreach(range(1, 5) as $index)
                        @if(!empty($projek->{'gambarIcon_' . $index}))
                            <div class="{{ $gambarCount == 1 ? 'col-12' : ($gambarCount == 2 ? 'col-6' : 'col-4') }} p-3">
                                <img src="{{ asset($projek->{'gambarIcon_' . $index}) }}" alt="Icon {{ $index }}" class="card-img-top mx-auto" style="max-width: 100px;" alt="Tidak terbaca">
                                <form action="{{ route('hapusIcon', ['id' => $projek->id, 'index' => $index]) }}" method="POST" class="text-center mt-2" id="deleteIconForm{{ $index }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $index }}, 'icon')">Hapus</button>
                                </form>
                            </div>
                        @endif
                    @endforeach               
                </div>
            </div>
            <div class="col-12 col-md-6 align-self-center" data-aos="fade-up">
                <h5>Tools yang digunakan,</h5>
                <h1>{{ $projek->title_2 }}</h1>
                <p class="py-2 opacity-50" style="line-height: 1.8;">{{ $projek->desk_2 }}</p>
            </div>
        </div>
    </div>
</div>

<!-- section 3 -->
<div class="container text-center">
    <h5 class="pt-5 pb-3" style="font-size:25px" data-aos="zoom-in">Jobdesk</h5>
    <p class="opacity-50 px-5" style="line-height: 1.8;" data-aos="fade-up">{{ $projek->desk_3 }}</p>
    <!-- <img src="{{ asset('Gambar/gambarorang.png') }}" class="card-img-top mx-auto" style="max-width: 200px;" alt="Tidak terbaca"> -->
    <div class="row py-3" data-aos="zoom-in">
        <div id="carouselExampleRide" class="carousel carousel-dark slide pb-5 rounded-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $gambarCount = 0;
                    $firstActiveSet = false;
                @endphp
                @foreach(range(1, 5) as $index)
                    @if (!empty($projek->{'gambarProjek_' . $index}))
                        @php
                            $gambarCount++;
                        @endphp
                        <div class="carousel-item {{ !$firstActiveSet ? 'active' : '' }}">
                            <img src="{{ asset($projek->{'gambarProjek_' . $index}) }}" class="d-block w-100 rounded" alt="Project Image {{ $index }}" style="width: 100%; height: 400px; object-fit: cover;">
                            <form action="{{ route('hapusGambar', ['id' => $projek->id, 'index' => $index]) }}" method="POST" class="position-absolute top-0 end-0 p-3" style="z-index:1000" id="deleteImageForm{{ $index }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $index }}, 'image')">Hapus</button>
                            </form>
                        </div>
                        @php
                            $firstActiveSet = true;
                        @endphp
                    @endif
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
                <form method="POST" action="{{ route('projek.update', $projek->id) }}" enctype="multipart/form-data" id="editProjectForm">
                    @csrf
                    @method('PUT')

                    <!-- Pilihan antara Edit Project atau Add Carousel Images -->
                    <div class="mb-3">
                        <label class="form-label">Mau ngedit apa nambah gambar min?</label>
                        <div>
                            <input type="radio" class="btn-check" name="edit_choice" id="edit_project" value="project" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="edit_project">detail</label>
                            
                            <input type="radio" class="btn-check" name="edit_choice" id="add_carousel" value="carousel" autocomplete="off">
                            <label class="btn btn-outline-primary" for="add_carousel">gambar</label>

                            <input type="radio" class="btn-check" name="edit_choice" id="add_icon" value="icon" autocomplete="off">
                            <label class="btn btn-outline-primary" for="add_icon">icon</label>

                            <input type="radio" class="btn-check" name="edit_choice" id="add_projek" value="icon" autocomplete="off">
                            <label class="btn btn-outline-primary" for="add_projek">Projek</label>
                        </div>
                    </div>

                    <!-- Form Edit Project -->
                    <div id="editProjectContent">
                        <div class="mb-3">
                            <label for="title_1" class="form-label">Perusahan mana?</label>
                            <input type="text" class="form-control" id="title_1" name="title_1" value="{{ $projek->title_1 }}">
                        </div>
                        <div class="mb-3">
                            <label for="title_2" class="form-label">Produknya apa?</label>
                            <input type="text" class="form-control" id="title_2" name="title_2" value="{{ $projek->title_2 }}">
                        </div>
                        <div class="mb-3">
                            <label for="desk_1" class="form-label">Jelasin singkat produknya dong</label>
                            <textarea class="form-control" id="desk_1" name="desk_1">{{ $projek->desk_1 }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="desk_2" class="form-label">Make apa ngerjain produknya?</label>
                            <textarea class="form-control" id="desk_2" name="desk_2">{{ $projek->desk_2 }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="desk_3" class="form-label">Kerja dibagian atau divisi apa sih?</label>
                            <textarea class="form-control" id="desk_3" name="desk_3">{{ $projek->desk_3 }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar_flyer" class="form-label">Upload sini kalo ada spanduk baru</label>
                            <input type="file" class="form-control" id="gambar_flyer" name="gambar_flyer">
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar_1" class="form-label">Upload sini kalo ada gambar produk yang lebih bagus</label>
                            <input type="file" class="form-control" id="gambar_1" name="gambar_1">
                        </div>
                    </div>

                    <!-- Form tambah Images -->
                    <div id="addCarouselContent" style="display:none">
                        @foreach(range(1, 9) as $index)
                            <div class="mb-3">
                                <label for="gambarProjek_{{ $index }}" class="form-label">Gambar Projek {{ $index }}</label>
                                
                                <!-- Menampilkan Gambar yang Ada -->
                                @if(!empty($projek->{'gambarProjek_' . $index}))
                                    <div>
                                        <img src="{{ asset($projek->{'gambarProjek_' . $index}) }}" alt="Project Image {{ $index }}" class="img-fluid mb-2" style="max-height: 200px; object-fit: cover;">
                                    </div>
                                @endif

                                <!-- Input File untuk Gambar Baru -->
                                <input type="file" class="form-control" id="gambarProjek_{{ $index }}" name="gambarProjek_{{ $index }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Form tambah Icon -->
                    <div id="addIconContent" style="display:none">
                        @foreach(range(1, 9) as $index)
                            <div class="mb-3">
                                <label for="gambarIcon_{{ $index }}" class="form-label">Gambar Icon {{ $index }}</label>

                                @if(!empty($projek->{'gambarIcon_' . $index}))
                                    <div>
                                        <img src="{{ asset($projek->{'gambarIcon_' . $index}) }}" alt="Icon Image {{ $index }}" class="img-fluid mb-2" style="max-height: 200px; object-fit: cover;">
                                    </div>
                                @endif

                                <input type="file" class="form-control" id="gambarIcon_{{ $index }}" name="gambarIcon_{{ $index }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Form link projek -->
                    <div id="addProjekContent" style="display:none">
                        <div class="mb-3">
                            <label for="link_projek" class="form-label">Kalo gaada link web nya make github aja</label>
                            <input type="text" class="form-control" id="link_projek" name="link_projek" value="">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    document.getElementById('edit_project').addEventListener('change', function() {
    document.getElementById('editProjectContent').style.display = 'block';
    document.getElementById('addCarouselContent').style.display = 'none';
    document.getElementById('addIconContent').style.display = 'none';
    document.getElementById('addProjekContent').style.display = 'none';
    });

    document.getElementById('add_carousel').addEventListener('change', function() {
        document.getElementById('editProjectContent').style.display = 'none';
        document.getElementById('addCarouselContent').style.display = 'block';
        document.getElementById('addIconContent').style.display = 'none';
        document.getElementById('addProjekContent').style.display = 'none';
    });

    document.getElementById('add_icon').addEventListener('change', function() {
        document.getElementById('editProjectContent').style.display = 'none';
        document.getElementById('addCarouselContent').style.display = 'none';
        document.getElementById('addIconContent').style.display = 'block';
        document.getElementById('addProjekContent').style.display = 'none';
    });
    document.getElementById('add_projek').addEventListener('change', function() {
        document.getElementById('editProjectContent').style.display = 'none';
        document.getElementById('addCarouselContent').style.display = 'none';
        document.getElementById('addIconContent').style.display = 'none';
        document.getElementById('addProjekContent').style.display = 'block';
    });



    function confirmDelete(index, type) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data ini akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Menentukan form yang akan di-submit
                let form = type === 'icon' ? document.getElementById('deleteIconForm' + index) : document.getElementById('deleteImageForm' + index);
                form.submit();  // Mengirim form untuk menghapus
            }
        });
    }




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
@include('Hf.footer')