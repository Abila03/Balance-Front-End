function showEditProfile() {
    const userName = localStorage.getItem('user_name');
    document.getElementById('editNama').value = userName;
}

async function updateProfile() {
    const userId = localStorage.getItem('user_id'); // pastikan user_id disimpan di localStorage
    const updatedName = document.getElementById('editNama').value;

    if (!userId) {
        console.error('User ID tidak ditemukan di localStorage.');
        return;
    }

    const response = await fetch(`https://balance-back-end-production.up.railway.app/api/auth/update/${userId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${localStorage.getItem('access_token')}` // pastikan token akses disimpan di localStorage
        },
        body: JSON.stringify({ nama: updatedName })
    });

    if (response.ok) {
        const data = await response.json();
        localStorage.setItem('user_name', updatedName);
        document.getElementById('user_name').textContent = updatedName;
        alert('Profil berhasil diperbarui');
        const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
        modal.hide();
    } else {
        alert('Gagal memperbarui profil');
    }
}

function saveProfile() {
    const newUserName = document.getElementById('editNama').value;
    localStorage.setItem('user_name', newUserName);
    document.getElementById('user_name').textContent = newUserName;
    document.querySelector('#editProfileModal .btn-close').click();
}

function logout() {
    localStorage.clear();
    window.location.href = '/'; 
}
function showEditForm(artikel) {
    document.getElementById('id-artikel-edit').value = artikel.id_artikel;
    document.getElementById('judul').value = artikel.judul;
    document.getElementById('isi').value = artikel.isi;
    document.getElementById('kategori').value = artikel.kategori;
    const editArticleModal = new bootstrap.Modal(document.getElementById('editArticleModal'));
    editArticleModal.show();
}
function saveArticle() {
    const idArtikel = document.getElementById('id-artikel-edit').value;
    const judul = document.getElementById('judul').value;
    const isi = document.getElementById('isi').value;
    const kategori = document.getElementById('kategori').value;

    fetch(`https://balance-back-end-production.up.railway.app/api/artikel/${idArtikel}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ judul, isi, kategori })
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector('#editArticleModal .btn-close').click();
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}