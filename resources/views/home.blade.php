<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
    <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="images/home1.png" alt="..." />
                    <div class="product-item-description text-center me-auto">
                        <div class="bg-faded p-5 rounded">
                            <h2 class="section-heading mb-1">
                                <span class="section-heading-upper">
                                    About Balance
                                </span>
                            </h2>
                            <p class="mb-0">
                                Temukan keseimbangan dalam gaya hidup modern dengan Balance, platform yang menawarkan panduan holistik melalui artikel inspiratif dan informatif tentang makanan sehat, kebugaran, fashion, dan makeup, membantu Anda untuk tampil prima dari dalam dan luar, serta menemukan harmoni sejati dalam kehidupan sehari-hari.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-black mb-1">
                CATEGORY
            </span>
        </h1>
        <section class="py-5">
            <div class="container px-4 px-lg-3 mt-1">
                <div class="row gx-3 gx-lg-3 row-cols-4 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class='col mb-5'>
                        <div class='card h-100' style='background-color: #404040;'>
                            <div class='card-body p-3'>
                                <div class='text-white'>
                                    <h5 class='fw-bolder text-center'> Healthy Food </h5>
                                    <p> Kami menghadirkan resep-resep lezat dan bergizi yang mudah diikuti, tips tentang cara memilih bahan makanan berkualitas, serta informasi tentang nutrisi yang penting bagi tubuh. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col mb-5'>
                        <div class='card h-100' style='background-color: #404040;'>
                            <div class='card-body p-3'>
                                <div class='text-white'>
                                    <h5 class='fw-bolder text-center'> Fitness </h5>
                                    <p> Menyajikan berbagai artikel yang informatif dan inspiratif tentang latihan fisik, mulai dari rutinitas sederhana untuk pemula hingga program intensif untuk yang lebih berpengalaman. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col mb-5'>
                        <div class='card h-100' style='background-color: #404040;'>
                            <div class='card-body p-3'>
                                <div class='text-white'>
                                    <h5 class='fw-bolder text-center'> Outfit </h5>
                                    <p> Sumber inspirasi gaya berpakaian yang dirancang untuk membantu Anda menemukan tampilan terbaik serta panduan tentang tren fashion terbaru dan tips mix and match </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col mb-5'>
                        <div class='card h-100' style='background-color: #404040;'>
                            <div class='card-body p-3'>
                                <div class='text-white'>
                                    <h5 class='fw-bolder text-center'> Make Up </h5>
                                    <p> Tips dan trik harian yang sederhana hingga tutorial langkah demi langkah yang mendetail, kami menyediakan berbagai panduan makeup yang dirancang untuk semua tingkatan keahlian. </p>
                                </div>
                            </div>
                        </div>
                    </div> <!--<div id="artikel-container"></div>-->
                </div>
            </div>
        </section>
    @include('components.footer')
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>
