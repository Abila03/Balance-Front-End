function deleteArticle(id) {
    if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
        $.ajax({
            url: `https://balance-back-end-production.up.railway.app/api/artikel/${id}`,
            type: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
                // 'Authorization': `Bearer ${localStorage.getItem('access_token')}`
            },
            success: function(result) {
                alert('Artikel berhasil dihapus');
                location.reload();
            },
            error: function(err) {
                alert('Gagal menghapus artikel');
                console.error('Error:', err);
            }
        });
    }
}