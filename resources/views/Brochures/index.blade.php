<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="scroll-behavior: smooth;">
  <head>

    @include('Components.header', ['title'=>'Brochures - Core Support Hub'])
    <style>
 .card {
   border: 1px solid #5057624b;
  
  }

  .card:hover {
    border-color: #c7ae6a; /* Gold border color on hover */
  }
  @media (min-width: 768px) and (max-width: 991.98px) {
      .col-md-6 {
        margin: 20px 0; /* Apply margin for md screen sizes */
      }
    }
  </style>
  </head>
  <body >
   
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
   @include('Components.nav',['title'=>'Brochures - Core Support Hub'])
      </div>
 
    {{-- main content --}}
    
<div class="container col-12" >
  <div class="row">
  <div class="col-lg-6 col-sm-12">
<div class="row">

  <div class="card m-3" style="width: 22rem; height:500px;">
       <div style="width:120%;">
        <img   src="{{ asset('images/ITmanaged.png') }}" alt="Card image cap">
    </div>
      <div class="card-body ">
        <h5 class="card-title " style="background-color: #22252a;padding-top:3%;padding-bottom:3%;color:white">IT Managed Services</h5>
        <p class="card-text"> Core Support Hub offers managed IT services including remote desktop support, system administration, and network monitoring to optimize your connectivity. </p>
       <a href="{{ route('brochures2') }}?Service=ItManageServices" class="btn btn-primary" style="background-color: white; color:#c7ae6a">Learn More ➜</a>
      </div>
    </div>

   <div class="card m-3" style="width: 22rem; height:500px;">
       <div style="width:120%;">
        <img   src="{{asset('images/softdev.png')}}" alt="Card image cap">
    </div>
      <div class="card-body ">
        <h5 class="card-title " style="background-color: #22252a;padding-top:3%;padding-bottom:3%;color:white">Software Development</h5>
        <p class="card-text">We design, build, and customize software and applications to enhance performance across operations, finance, HR, inventory, and business websites.</p>
       <a href="{{ route('brochures2') }}?Service=SoftDevelopment" class="btn btn-primary" style="background-color: white; color:#c7ae6a">Learn More ➜</a>
      </div>
    </div>

    </div>
  </div>
  
<div class="col-lg-6 col-sm-12">
  <div class="row">

        <div class="card m-3" style="width: 22rem; height:500px;">
       <div style="width:120%;">
        <img   src="{{asset('images/bpo.png')}}" alt="Card image cap">
    </div>
      <div class="card-body ">
        <h5 class="card-title " style="background-color: #22252a;padding-top:3%;padding-bottom:3%;color:white">Business Process Outsourcing</h5>
        <p class="card-text"> Core Support Hub extends your business by understanding operations and delivering authentic brand ambassador services to your customers.</p>
       <a href="{{ route('brochures2') }}?Service=BusinessProcessOutsourcing" class="btn btn-primary" style="background-color: white; color:#c7ae6a">Learn More ➜</a>
      </div>
    </div>

      <div class="card m-3" style="width: 22rem; height:500px;">
       <div style="width:120%;">
        <img   src="{{asset('images/consulting.png')}}" alt="Card image cap">
    </div>
      <div class="card-body ">
        <h5 class="card-title " style="background-color: #22252a;padding-top:3%;padding-bottom:3%;color:white">Consulting</h5>
        <p class="card-text">Core Support Hub is your strategic technology partner, enhancing efficiency and delivering exceptional products and services for seamless business success.</p>
       <a href="{{ route('brochures2') }}?Service=Consulting" class="btn btn-primary" style="background-color: white; color:#c7ae6a">Learn More ➜</a>
      </div>
    </div>

  </div>
</div>
 </div>
</div>

<br>
    {{-- main content end--}}
 
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