$(document).ready(function() {
    $('#article-form').submit(function(e) {
        e.preventDefault(); // Mencegah form untuk melakukan submit secara default

        // Mengambil data dari form
        var judul = $('#article-title').val();
        var kategori = $('#article-category').val();
        var isi = $('#summernote').val();

        // Mengambil id_pengguna dari localStorage
        var id_pengguna = localStorage.getItem('user_id');

        // Mengirim data ke endpoint
        fetch('https://balance-back-end-production.up.railway.app/api/artikel', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                judul: judul,
                id_pengguna: id_pengguna, // Menggunakan id_pengguna dari localStorage
                kategori: kategori,
                isi: isi
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to add article');
            }
            return response.json();
        })
        .then(data => {
            alert('Article published successfully');
            // Lakukan sesuatu setelah artikel berhasil dipublish, seperti mengarahkan pengguna ke halaman lain
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to publish article. Please try again later.');
        });
    });
});