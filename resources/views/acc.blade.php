<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
        <div class="banner">
            <img src="images/intro.jpg" alt="Profile Picture" style="display: block; margin: 0 auto;" class="profil"/>
            <div id="acc"></div>
            <div class="text-white text-center">
                <p><span id="user_name"></span></p>
                <p><span id="user_email"></span></p>
                <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Akun</button>
                <button class="btn btn-danger" onclick="logout()">Logout</button>
            </div>
        </div>
        <div id="artikel"></div>
        @include('components.footer')
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
                        <input class="form-control" type="text" id="editNama" placeholder="Masukkan Nama">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Tutup</button>
                        <button onclick="saveProfile()" class="btn btn-primary text-white">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="form-group col-xl-4">
                                <select class="form-control" id="kategori" name="kategori">
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const userName = localStorage.getItem('user_name');
                const userEmail = localStorage.getItem('user_email');
                
                document.getElementById('user_name').textContent = userName;
                document.getElementById('user_email').textContent = userEmail;
            });
        </script>
    </body>
</html>
