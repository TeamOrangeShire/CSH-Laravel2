<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="scroll-behavior: smooth;">

<head>

    @include('Components.header', ['title' => 'Brochures - Core Support Hub'])
    <style>
  .heading {
            color: white;
            font-size: 55px;
        }
        .border-white {
            border-color: white;
        }
        .border-red {
            border: 2px solid red;
        }
        .img-responsive {
            height: 80vh;
        }
    </style>
</head>

<body style="background-color: #22252a;">

    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container"><span></span><span></span><span></span><span></span>
            </div>
        </div>
    </div>
    <div class="page">
        <div id="home">
            <!-- Top Banner-->
            <!-- Page Header-->
            @include('Components.nav', ['title' => 'Brochures - Core Support Hub'])

        </div>

        {{-- main content --}}

   <div class="col-12">
    <div class="row ">
        <div class="col">
            <h1 class="heading">
                Technology Outsourcing
            </h1>
            <hr class="border-white"> 
            <p style="color: white;">
            We streamline operations, enhance efficiency, and deliver exceptional products and services. With us, your technology needs are expertly managed for seamless business success.    
            </p>   
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-lg-6 col-sm-12 "> 
    <img src="{{ asset('images/ittech.png') }}" class="" alt="Another image of technology equipment">
            </div>
  <div class="col-lg-6 col-sm-12 "> 
    <img src="{{ asset('images/ittech2.png') }}" class="rounded d-block" alt="Another image of technology equipment">
            </div>
            </div>
        </div>
    </div>
</div>

        <br>

        {{-- main content end --}}

        {{-- main content end --}}

        <!-- BPO Subservices end -->
        @include('Components.footer')
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->

    @include('Components.fab')


    <!-- Javascript-->
    @include('Components.scripts')

</body>

</html>
