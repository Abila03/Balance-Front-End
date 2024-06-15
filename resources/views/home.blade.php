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
        @include('components.kategori')
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>