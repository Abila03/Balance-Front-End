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
                                    <!-- Product name-->
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
        <div id="artikel-page" class="container px-5 px-lg-5 mt-1"></div> <!-- This is where articles will be displayed -->
        @include('components.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            // Fetch data from the API
            fetch('https://balance-back-end-production.up.railway.app/api/artikel')
                .then(response => response.json())
                .then(data => {
                    const artikelContainer = document.getElementById('artikel-page');
                    data.forEach(artikel => {
                        // Create card for each article
                        const card = document.createElement('div');
                        card.classList.add('col', 'mb-5');
                        card.innerHTML = `
                        <section class='page-section clearfix'>  
                            <div class='container'>
                                <div class='intro'>
                                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="images/article 1.png" alt="..." />
                                        <div class="intro-text text-right bg-faded p-5 rounded ">
                                            <h2 class="section-heading mb-2">
                                                <span class="section-heading-upper">
                                                ${artikel.judul}
                                                </span>
                                            </h2>
                                            <p class="mb-1">
                                                ${artikel.isi}
                                            </p>
                                        <div class="intro-button mx-auto">
                                            <a class="btn btn-primary text-white btn-xl" href="/detail" onclick="saveArtikelToLocal(${JSON.stringify(artikel).replace(/"/g, '&quot;')})">
                                                Baca Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        `;
                        artikelContainer.appendChild(card);
                    });
                })
                .catch(error => console.error('Error:', error));

            function saveArtikelToLocal(artikel) {
                localStorage.setItem('selectedArtikel', JSON.stringify(artikel));
            }
        </script>
    </body>
</html>
