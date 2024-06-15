<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
    @include('components.header')
    @include('components.navbar')
        <div id="artikel-page" class="container px-5 px-lg-5 mt-1"></div> <!-- This is where articles will be displayed -->
        @include('components.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
    </body>
</html>
