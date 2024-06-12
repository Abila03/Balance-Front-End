$(document).ready(function() {
  $('#form').submit(function(e) {
      e.preventDefault(); // Mencegah form untuk melakukan submit secara default

      // Mengambil nilai ID artikel dari input
      var idArtikel = $('#id-artikel-delete').val();

      // Mengirim data ke endpoint
      fetch('https://balance-back-end-production.up.railway.app/api/artikel/' + idArtikel, {
          method: 'DELETE',
          headers: {
              'Content-Type': 'application/json'
          }
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Failed to delete article');
          }
          return response.json();
      })
      .then(data => {
          alert('Article deleted successfully');
          // Lakukan sesuatu setelah artikel berhasil dihapus, seperti memperbarui tampilan atau mengarahkan pengguna ke halaman lain
      })
      .catch(error => {
          console.error('Error:', error);
          alert('Failed to delete article. Please try again later.');
      });
  });
});