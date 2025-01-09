@include('Hf.header')

<div class="container mb-5">
    <div class="row">
        <div class="col-xl-7 my-auto mx-auto">
            <img src="{{ asset('Gambar/admin.png') }}" class="img-fluid w-100" alt="">
        </div>
        <div class="col-xl-5 d-flex flex-column align-items-center justify-content-center my-auto mx-auto">
            <div class="col-11">
                <h5>Login dulu yuk</h5>
                <p class="opacity-50" style="line-height: 1.8; font-size:12px;">Ada informasi baru apalagi nih buat mas Risky</p>
                <form action="{{ route('action.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="font-size:10px">Masukkan email yang biasa</label>
                        <input type="email" name="email" class="form-control border-2 border-top-0 border-start-0 border-end-0 rounded-0 w-100" id="exampleInputEmail1" aria-describedby="emailHelp" style="font-size:10px;">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="font-size:10px">Kuncinya jangan lupa</label>
                        <input type="password" name="password" class="form-control border-2 border-top-0 border-start-0 border-end-0 rounded-0 w-100" id="exampleInputPassword1" style="font-size:10px;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
