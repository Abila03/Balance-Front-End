
const userId = localStorage.getItem('user_id');
fetch('https://balance-back-end-production.up.railway.app/api/artikel')
    .then(response => response.json())
    .then(data => {
        const artikelContainer = document.getElementById('artikel');
        const filteredArtikel = data.filter(artikel => artikel.id_pengguna == userId);
        
        filteredArtikel.forEach(artikel => {
            const card = document.createElement('div');
            card.classList.add('col', 'mb-5');
            card.innerHTML = `
            <section class='page-section clearfix'>  
                <div class='container'>
                    <div class='intro'>
                        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="images/article 2.png" alt="..." />
                        <div class="intro-text text-right bg-faded p-5 rounded ">
                            <div class="btn btn-primary text-white text-center" style="position: absolute; top: 0; left: 0;">
                                <h5 class="fw-bolder">
                                    ${artikel.kategori}
                                </h5>
                            </div>
                            <button class="btn btn-danger" style="position: absolute; top: 5; right: 0;" onclick="deleteArticle(${artikel.id_artikel})">
                                Hapus
                            </button>
                            <button class="btn btn-primary text-white" style="position: absolute; top: 0; right: 0;" onclick='showEditForm(${JSON.stringify(artikel)})'>
                                Edit
                            </button>
                            <br>
                            <h2 class="section-heading mb-2">
                                <span class="section-heading-upper">
                                    ${artikel.id_artikel}. ${artikel.judul}
                                </span>
                            </h2>
                            <p class="mb-1">
                                ${artikel.isi}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            `;
            artikelContainer.appendChild(card);
        });
    })
    .catch(error => console.error('Error:', error));
