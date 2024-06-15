<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img id="artikel-image" class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="images/article 1.png" alt="..." />
                    <div class="intro-text right-0 text-center bg-faded p-5 ms-auto rounded ">
                        <div class="btn  text-white text-center" style="position: absolute; top: 0; right: 0; background-color:grey;">
                            <h5 class="fw-bolder" id="artikel-kategori"></h5>
                        </div>
                        <h2 class="section-heading mb-2">
                            <span class="section-heading-upper" id="artikel-judul"></span>
                        </h2>
                        <p class="mb-1" id="artikel-isi"></p>
                    </div>
                </div>
            </div>
        </section>
        @include('components.footer')
    </body>
</html>
