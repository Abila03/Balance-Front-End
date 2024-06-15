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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
