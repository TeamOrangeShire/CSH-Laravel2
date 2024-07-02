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

          .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }
        .modal.fade.show .modal-dialog {
            transform: translate(0, 0);
            opacity: 1;
        }
        .modal-dialog {
            transform: translate(0, -50px);
            opacity: 0;
        }


#hov {
    position: relative;
    display: inline-block;
}

#hov .overlay-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 10px 20px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 2;
}

#hov::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0);
    transition: background-color 0.3s ease;
    z-index: 1;
}

#hov:hover::after {
    background-color: rgba(0, 0, 0, 0.5);
}

#hov:hover .overlay-text {
    opacity: 1;
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


<?php

if (isset($_GET['Service'])) {
   
    if ($_GET['Service'] == 'ItManageServices') {
      ?>
<div class="col-12" style="margin-top:-1% ">
    <div class="row ">
        <div class="col">
            <h1 class="heading">
                IT Managed Services
            </h1>
            <hr class="border-white"> 
            <p style="color: white;">
           Core Support Hub provides managed services for your IT needs whether it's for providing remote desktop support for your computers and system administration to remotely monitoring your network to ensure your connectivity is performing as expected.
          </p>   
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view()">
                    <img src="{{ asset('images/ittech.png') }}" id="img1" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 "> 
                 <div id="hov"style="width: 100%;" onclick="view2()">
                    <img src="{{ asset('images/ittech2.png') }}" id="img2" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
      <?php 
    }elseif ($_GET['Service'] == 'SoftDevelopment') {
       ?>
<div class="col-12" style="margin-top:-1% ">
    <div class="row ">
        <div class="col">
            <h1 class="heading">
                Software Development
            </h1>
            <hr class="border-white"> 
            <p style="color: white;">
           We design, build and customize software and applications for your business. Software can improve overall performance for your operations, finance, HR, inventory or even for your business websites.
           </p>   
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view()">
                    <img src="{{ asset('images/ittech.png') }}" id="img1" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
                </div>
            <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view2()">
                    <img src="{{ asset('images/ittech2.png') }}" id="img2" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
      <?php 
    }elseif ($_GET['Service'] == 'BusinessProcessOutsourcing') {
       ?>
 <div class="col-12" style="margin-top:-1% ">
    <div class="row ">
        <div class="col">
            <h1 class="heading">
                Business Process Outsourcing
            </h1>
            <hr class="border-white"> 
            <p style="color: white;">
           Core Support Hub is an extension of your business. We partner with you to know your business and our team members deliver services to your customers as true representatives of your brand.
          </p>   
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view()">
                    <img src="{{ asset('images/bpobrochure.png') }}" id="img1" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
            </div>
  <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view2()">
                    <img src="{{ asset('images/bpobrochure2.png') }}" id="img2" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
      <?php 
    }elseif ($_GET['Service'] == 'Consulting') {
       ?>
 <div class="col-12" style="margin-top:-1% ">
    <div class="row ">
        <div class="col">
            <h1 class="heading">
                Consulting
            </h1>
            <hr class="border-white"> 
            <p style="color: white;">
            At the core of the outsourcing relationship is Core Support Hub’s Consulting offering. To build the right business process design, the right technology infrastructure and support and the right software solution, having a comprehensive consulting engagement is key.
          </p>   
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view()">
                    <img src="{{ asset('images/consultingbrochure.png') }}" id="img1" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
            </div>
  <div class="col-lg-6 col-sm-12 "> 
                    <div id="hov"style="width: 100%;" onclick="view2()">
                    <img src="{{ asset('images/consultingbrochure2.png') }}" id="img2" class="" alt="Another image of technology equipment">
                    <div class="overlay-text">Click to expand</div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
      <?php 
    }
   
} else {
    
    echo "<div>Url Is Incorrect</div>";
}
?>

        <br>

        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalConsultingLabel"
    aria-hidden="true" style="margin-top: -60%;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" style=" background: transparent; border:none;">
            <div class="modal-body" >
                <img src="" id="modalIMG" alt="">
            </div>
        </div>
    </div>
</div>
        {{-- main content end --}}

        {{-- main content end --}}

        <!-- BPO Subservices end -->
        @include('Components.footer')
    </div>
    <script>
        function view(){
            $('#modal1').modal('show');
            const img = document.getElementById('img1').src
            document.getElementById('modalIMG').src=img;
        }
          function view2(){
            $('#modal1').modal('show');
            const img = document.getElementById('img2').src
            document.getElementById('modalIMG').src=img;
        }
    </script>
    <!-- Button trigger modal -->

    <!-- Modal -->

    @include('Components.fab')


    <!-- Javascript-->
    @include('Components.scripts')

</body>

</html>
