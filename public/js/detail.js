document.addEventListener('DOMContentLoaded', function() {
  const artikel = JSON.parse(localStorage.getItem('selectedArtikel'));
  if (artikel) {
      document.getElementById('artikel-judul').innerHTML = artikel.judul;
      document.getElementById('artikel-isi').innerHTML = artikel.isi;
      document.getElementById('artikel-kategori').innerHTML = artikel.kategori;
      if (artikel.image) {
          document.getElementById('artikel-image').src = artikel.image;
      }
  } else {
      document.getElementById('artikel-judul').innerText = 'Artikel tidak ditemukan';
      document.getElementById('artikel-isi').innerText = '';
      document.getElementById('artikel-kategori').innerText = '';
  }
});