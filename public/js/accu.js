$(document).ready(function() {
  $('#edit').submit(function(e) {
      e.preventDefault(); 

      var idArtikel = $('#id-artikel-edit').val();
      var judul = $('#judul').val();
      var isi = $('#isi').val();
      var kategori = $('#kategori').val();

      fetch('https://balance-back-end-production.up.railway.app/api/artikel/' + idArtikel, {
          method: 'PUT',
          headers: {
              'Content-Type': 'application/json; charset=UTF-8',
          },
          body: JSON.stringify({
              judul: judul,
              isi: isi,
              kategori: kategori
          })
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Failed to edit article');
          }
          return response.json();
      })
      .then(data => {
          alert('Article edited successfully');
      })
      .catch(error => {
          console.error('Error:', error);
          alert('Failed to edit article. Please try again later.');
      });
  });
});
