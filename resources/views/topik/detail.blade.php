@extends('layout/main')
@section('title','Detail Topik')

@section('container')
<div class="container-fluid" >

<div style="min-height: 300px;position: relative;z-index: 1;overflow: hidden;">
        <div style="height: 260px;background: url(https://stillmed.olympic.org/media/Images/OlympicOrg/News/2019/12/11/2019-12-11-mountain-day-featured-01.jpg) 0px 0px repeat-x;margin-bottom: 105px;background-repeat:no-repeat;">
            <div style="background:url({{URL::to('asset/banner.png')}}) 0px 0px no-repeat;" class="ml-0">
            <div class="mt-3" style="width: 100%;max-width: 1500px;height: 260px;position: relative;margin: 0 auto;overflow: hidden;">
                <div class="col-1 my-0 mx-3 " style="text-align: center;">
                    <!-- &#60; teh < -->
                    <a href="/topik" class="btn btn-primary"> &#60;Back </a>
                </div> 
            <div style="height: 260px;line-height: 140px;color: #ffffff;padding: 0 20px;position: relative;font-size:40pt;">
             <div class="container">
             <p><strong>{{$topik->nama_topik}}</strong></p>
             </div>
            </div>
            </div>
            </div>
        </div>
        
      </div>



<div class="container">
    <div class="row">
        <div class="col-6">
            <!-- <h1 class="mt-3"> {{$topik->nama_topik}}</h1> -->
            <div class="card" >
                <div class="card-body">

                <div>
                @foreach($seminar as $s)
                <div>
                    <a href="/seminar/{{$s->id_seminar}}" class="topik">
                    {{$s->nama_seminar}}
                    </a>
                </div>
                @endforeach
                </div>
           


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(document).on('click','.topik',function(){
    <?php $status="topik" ?>
});
    </script>
@endsection