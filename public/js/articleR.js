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
                                <div class="btn  text-white text-center" style="position: absolute; top: 0; right: 0; background-color:grey;">
                                  <h5 class="fw-bolder">
                                    ${artikel.kategori}
                                  </h5>
                                </div>
                                <br>
                                <br>
                                <h2 class="section-heading mb-2">
                                  <span class="section-heading-upper">
                                    ${artikel.judul}
                                  </span>
                                </h2>
                                <p class="mb-1">
                                    ${artikel.isi}
                                </p>
                                <div class="intro-button mx-auto " style="justify-content: space-between;">
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