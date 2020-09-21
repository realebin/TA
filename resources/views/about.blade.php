@extends('layout/main')
@section('title','About')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-3"> About Abdimas</h1>
            <h6>Made By : Febrina Anastasha 1772006</h6>
            <h6>Logo Made By : Febrina Anastasha 1772006</h6>
            <h6>Copyrights are reserved</h6>
        </div>
        <div class="col-10">
            <img src={{URL::to('asset/logo.png')}} width="100" height="100" class="d-inline-block align-top" alt="" loading="lazy">
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
  $('li.active').removeClass('active');
  $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
});
</script>
@endsection