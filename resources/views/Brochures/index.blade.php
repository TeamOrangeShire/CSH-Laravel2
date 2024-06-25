<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="scroll-behavior: smooth;">
  <head>

    @include('Components.header', ['title'=>'Brochures - Core Support Hub'])
    <style>
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
  <body>
   
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
   @include('Components.nav',['title'=>'bpo'])


      </div>
 
    
   
<?php

if (isset($_GET['Type'])) {
   
    if ($_GET['Type'] == 'ItManageServices') {
      ?>
<div class="d-flex justify-content-center align-items-center" id="ItB">
    <div id="hov" class="text-center position-relative" style="width: 80%;">
        <img src="{{asset('images/ITmanaged.png')}}" class="rounded img-fluid" alt="Responsive image">
        <div class="overlay-text">Click to expand</div>
    </div>
</div>
      <?php 
    }elseif ($_GET['Type'] == 'SoftDevelopment') {
       ?>
<div class="d-flex justify-content-center align-items-center" id="softB">
    <div id="hov" class="text-center position-relative" style="width: 80%;">
        <img src="{{asset('images/softdev.png')}}" class="rounded img-fluid" alt="Responsive image">
        <div class="overlay-text">Click to expand</div>
    </div>
</div>
      <?php 
    }elseif ($_GET['Type'] == 'BusinessProcessOutsourcing') {
       ?>
<div class="d-flex justify-content-center align-items-center" id="bpoB">
    <div id="hov" class="text-center position-relative" style="width: 80%;">
        <img src="{{asset('images/bpo.png')}}" class="rounded img-fluid" alt="Responsive image">
        <div class="overlay-text">Click to expand</div>
    </div>
</div>
      <?php 
    }elseif ($_GET['Type'] == 'Consulting') {
       ?>
<div class="d-flex justify-content-center align-items-center" id="colB">
    <div id="hov" class="text-center position-relative" style="width: 80%;">
        <img src="{{asset('images/consulting.png')}}" class="rounded img-fluid" alt="Responsive image">
        <div class="overlay-text">Click to expand</div>
    </div>
</div>
      <?php 
    }
   
} else {
    
    echo "<div>'var' parameter not found in the URL</div>";
}
?>



      {{-- main content --}}
    {{-- <div class="d-flex justify-content-center align-items-center">
    <div class="col-sm-8 col-md-6 col-lg-10">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" id="hov">
            <img class="d-block w-100" src="{{asset('images/ITmanaged.png')}}" alt="First slide">
            <div class="overlay-text">Click to expand</div>
        </div>
         <div class="carousel-item" id="hov">
            <img class="d-block w-100" src="{{asset('images/softdev.png')}}" alt="Third slide">
            <div class="overlay-text">Click to expand</div>
        </div>
        <div class="carousel-item" id="hov">
            <img class="d-block w-100" src="{{asset('images/bpo.png')}}" alt="Second slide">
            <div class="overlay-text">Click to expand</div>
        </div>
        <div class="carousel-item" id="hov">
            <img class="d-block w-100" src="{{asset('images/consulting.png')}}" alt="Third slide">
            <div class="overlay-text">Click to expand</div>
        </div>
       
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

    </div>
</div> --}}

<!-- Modals -->
<div class="modal fade" id="modalConsulting" tabindex="-1" role="dialog" aria-labelledby="modalConsultingLabel"
    aria-hidden="true" style="margin-top: -60%;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" style=" background: transparent; border:none;">
            <div class="modal-body" >
                <div class="d-flex justify-content-center align-items-center">
    <div class="col-sm-8 col-md-6 col-lg-12">
        <div id="first" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/ittech.png')}}" alt="First slide" style="">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/ittech2.png')}}" alt="Second slide">
                </div>
               
            </div>
            <a class="carousel-control-prev" href="#first" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#first" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalITManaged" tabindex="-1" role="dialog" aria-labelledby="modalConsultingLabel"
    aria-hidden="true" style="margin-top: -60%;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" style=" background: transparent; border:none;">
            <div class="modal-body" >
                <div class="d-flex justify-content-center align-items-center">
    <div class="col-sm-8 col-md-6 col-lg-12">
        <div id="second" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/ittech.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/ittech2.png')}}" alt="Second slide">
                </div>
              
            </div>
            <a class="carousel-control-prev" href="#second" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#second" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSoftDev" tabindex="-1" role="dialog" aria-labelledby="modalConsultingLabel"
    aria-hidden="true" style="margin-top: -60%;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" style=" background: transparent; border:none;">
            <div class="modal-body" >
                <div class="d-flex justify-content-center align-items-center">
    <div class="col-sm-8 col-md-6 col-lg-12">
        <div id="third" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/bpobrochure.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/bpobrochure2.png')}}" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#third" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#third" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConsult" tabindex="-1" role="dialog" aria-labelledby="modalConsultingLabel"
    aria-hidden="true" style="margin-top: -60%;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" style=" background: transparent; border:none;">
            <div class="modal-body" >
                <div class="d-flex justify-content-center align-items-center">
    <div class="col-sm-8 col-md-6 col-lg-12">
        <div id="fourth" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/consultingbrochure.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/consultingbrochure2.png')}}" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#fourth" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#fourth" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
      {{-- main content end --}}
    <!-- BPO Subservices end -->
    @include('Components.footer')
    </div>
<script>
    $(document).ready(function() {
    // $('#carouselExampleControls .carousel-item').each(function() {
    //     $(this).on('click', function() {
    //         if ($(this).hasClass('active')) {
    //             var index = $(this).index();
    //             if (index === 0) {
    //                 $('#modalConsulting').modal('show');
    //             } else if (index === 1) {
    //                 $('#modalITManaged').modal('show');
    //             } else if (index === 2) {
    //                 $('#modalSoftDev').modal('show');
    //             }
    //              else if (index === 3) {
    //                 $('#modalConsult').modal('show');
    //             }
    //         }
    //     });
    // });
     $('#ItB').on('click', function() {
        $('#modalConsulting').modal('show');
    });
      $('#softB').on('click', function() {
        $('#modalConsulting').modal('show');
    });
      $('#bpoB').on('click', function() {
        $('#modalSoftDev').modal('show');
    });
      $('#colB').on('click', function() {
        $('#modalConsult').modal('show');
    });
});

</script>
<!-- Button trigger modal -->

<!-- Modal -->

   @include('Components.fab')

   
    <!-- Javascript-->
    @include('Components.scripts')
   
  </body>
</html>