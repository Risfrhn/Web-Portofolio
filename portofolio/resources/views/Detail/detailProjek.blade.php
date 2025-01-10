@include('Hf.header')

<!-- gambar spanduk -->
<div class="container-fluid" data-aos="zoom-in">
    <img src="{{ asset($projek->gambar_flyer) }}" class="d-block w-100 rounded" alt="Gambar tidak terbaca" style="width: 100%; height: 500px; object-fit: cover;">
</div>

<!-- section 1 -->
<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-6 align-self-center text-center text-md-start " data-aos="fade-right">
            <h5>{{ $projek->title_1 }}</h5>
            <h1>{{ $projek->title_2 }}</h1>
            <p class="py-2 opacity-50" style="line-height: 1.8;">{{ $projek->desk_1 }}</p>
            @if(!empty($projek->link_projek))
                <a type="button" class="btn btn-outline-primary" href="{{ $projek->link_projek }}">Ingin Mengunjungi?</a>
            @endif
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
                            </div>
                        @endif
                    @endforeach               
                </div>
            </div>
            <div class="col-12 col-md-6 align-self-center text-center text-md-start" data-aos="fade-up">
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
    });

    document.getElementById('add_carousel').addEventListener('change', function() {
        document.getElementById('editProjectContent').style.display = 'none';
        document.getElementById('addCarouselContent').style.display = 'block';
        document.getElementById('addIconContent').style.display = 'none';
    });

    document.getElementById('add_icon').addEventListener('change', function() {
        document.getElementById('editProjectContent').style.display = 'none';
        document.getElementById('addCarouselContent').style.display = 'none';
        document.getElementById('addIconContent').style.display = 'block';
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