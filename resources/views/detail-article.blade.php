<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
    <section class="py-1">
            <div class="container px-5 px-lg-5 mt-1">
                <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-6 row-cols-xl-5 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <img  
                                        src="images/filter.png" 
                                        alt="..." 
                                        class="intro-img filter" 
                                        style="left: 0; bottom: 10; top:10; width: 30px; height: 30px;"
                                    />
                                    <h5 class="fw-bolder">Filter By:</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <h5 class="fw-bolder">Healthy Food</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <h5 class="fw-bolder">Fitness</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Outfit</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Make Up</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img id="artikel-image" class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="images/article 1.png" alt="..." />
                    <div class="intro-text right-0 text-center bg-faded p-5 ms-auto rounded ">
                        <h2 class="section-heading mb-2">
                            <span class="section-heading-upper" id="artikel-judul"></span>
                        </h2>
                        <p class="mb-1" id="artikel-isi"></p>
                    </div>
                </div>
            </div>
        </section>
        @include('components.footer')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const artikel = JSON.parse(localStorage.getItem('selectedArtikel'));
                if (artikel) {
                    document.getElementById('artikel-judul').innerHTML = artikel.judul;
                    document.getElementById('artikel-isi').innerHTML = artikel.isi;
                    // Update image source if available
                    if (artikel.image) {
                        document.getElementById('artikel-image').src = artikel.image;
                    }
                } else {
                    document.getElementById('artikel-judul').innerText = 'Artikel tidak ditemukan';
                    document.getElementById('artikel-isi').innerText = '';
                }
            });
        </script>
    </body>
</html>
