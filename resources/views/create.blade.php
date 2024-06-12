<!DOCTYPE html>
<html lang="en">
@include('components.headCreate')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
        <section class="page-section about-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <form id="article-form">
                            <div class="form-group col-xl-6">
                                <label for="article-title">Article Title:</label>
                                <input type="text" class="form-control" id="article-title" name="judul" placeholder="Enter your article title here">
                            </div>
                            <div class="form-group col-xl-2">
                                <label for="article-category">Category:</label>
                                <select class="form-control" id="article-category" name="kategori">
                                    <option >Select Category</option>
                                    <option value="Healthy Food"> Healthy Food </option>
                                    <option value="Fitness"> Fitness </option>
                                    <option value="Outfit"> Outfit </option>
                                    <option value="Make Up"> Make Up </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Article Content:</label>
                                <textarea id="summernote" name="isi" rows="10"></textarea>
                            </div>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-primary text-white" style="margin-right: auto" name="submit">
                                    Publish Article
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @include('components.footer')
        <!-- your HTML code -->
        <script>
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
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    </body>
</html>
