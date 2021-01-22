<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeorgeToko</title>
    <!-- Latest compiled and minified CSS for bootstrap cdn-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript from bootstrap cdn-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    {{ View::make('header2') }}
    @yield('content')
    {{ View::make('footer') }}

</body>
<style>
.custom-login{
    height: 500px;
    padding-top: 100px;
}
img.slider-img{
    height: 400px !important;
}
.custom-product{
    height: 600px;
}
.slider-text{
    background-color: #5c6d5c4a;
}
img.trending-image{
    height: 100px;
}
img.trending-image-search{
    height: 250px;
}
.trending-item{
    float:left;
    width: 20%;
}
.trending-wrapper{
    margin: 30px;
}
img.detail-img{
    height: 200px;
}
.search-box{
    width: 500px !important;
}
.cart-list-divider{
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
    padding-bottom: 20px;
}
.link-web a{
    color: #000;
  text-decoration: none;
  transition: color 0.5s;
}
.link-web a:hover{
    transition: 1s;
  border-bottom: 0px;
    color: #646786;

}
.dropdown:hover .dropdown-menu {
  display: block;
}
</style>
</html>