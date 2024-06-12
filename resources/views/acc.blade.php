<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
        <div class="banner">
            <img src="images/intro.jpg" alt="Profile Picture" style="display: block; margin: 0 auto;" class="profil"/>
            <div id="acc"></div>
            <!-- Menampilkan nama dan email pengguna dari localStorage -->
            <div class="text-white text-center">
                <p><span id="user_name"></span></p>
                <p><span id="user_email"></span></p>
                <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Akun</button>
                <button class="btn btn-danger" onclick="logout()">Logout</button>
            </div>
        </div>
        <div id="artikel"></div>
        @include('components.footer')

        <!-- Edit Profile Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="profil-container text-center">
                            <img src="images/intro.jpg" alt="Profile Picture" class="profil">
                            <a onclick="changeProfile()">
                                <img src="images/changeProfile.png" alt="Change Profile" class="kamera">
                            </a>
                        </div>
                        <br>
                        <!-- Menampilkan data nama -->
                        <input class="form-control" type="text" id="editNama" placeholder="Masukkan Nama">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Tutup</button>
                        <button onclick="saveProfile()" class="btn btn-primary text-white">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Article Modal -->
        <div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editArticleModalLabel">Edit Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id-artikel-edit">
                        <input class="form-control mb-2" type="text" id="judul" placeholder="Masukkan judul">
                        <input class="form-control mb-2" type="text" id="isi" placeholder="Masukkan isi">
                        <!--<input class="form-control mb-2" type="text" id="kategori" placeholder="">-->
                        <div class="form-group col-xl-3">
                                <select class="form-control" id="kategori" name="kategori">
                                    <option >Pilih kategori</option>
                                    <option value="Healthy Food"> Healthy Food </option>
                                    <option value="Fitness"> Fitness </option>
                                    <option value="Outfit"> Outfit </option>
                                    <option value="Make Up"> Make Up </option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
                        <button onclick="saveArticle()" class="btn btn-primary text-white">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const userName = localStorage.getItem('user_name');
                const userEmail = localStorage.getItem('user_email');
                
                document.getElementById('user_name').textContent = userName;
                document.getElementById('user_email').textContent = userEmail;
            });

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

            // Menampilkan form edit artikel dengan data yang ada
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

            function logout() {
                localStorage.clear();
                window.location.href = '/'; 
            }
        </script>

        <script src="acc.js"></script>
    </body>
</html>
