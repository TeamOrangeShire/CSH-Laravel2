<style>
.rd-nav-submenu {
    display: none;
    position: absolute;
    background-color: white; /* Adjust as needed */
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Optional: Add shadow for better visibility */
    margin-top: 4px; /* Default margin */
    padding: 0;
    width: 280px;
    list-style: none;
    z-index: 1000; /* Make sure the submenu is above other elements */
    text-align: left; 
}

.rd-nav-subsubmenu {
    display: none;
    position: absolute;
    background-color: white; /* Adjust as needed */
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Optional: Add shadow for better visibility */
    margin-top: 4px; /* Default margin */
    padding: 0;
    width: 280px;
    list-style: none;
    z-index: 1000; /* Make sure the submenu is above other elements */
    text-align: left; 
    left: 100%; /* Position it to the right of the parent submenu */
    top: 0; /* Align to the top of the parent submenu item */
}

.rd-nav-item {
    position: relative;
}

/* .rd-nav-subitem:hover .rd-nav-subsubmenu {
    display: block;
} */

.rd-nav-item:hover .rd-nav-submenu {
    display: block;
}

.rd-nav-subitem {
    padding: 8px 16px; /* Adjust as needed */
}

.rd-nav-sublink {
    text-decoration: none;
    color: black; /* Adjust as needed */
    display: block;
}

.rd-nav-sublink:hover {
    background-color: #f1f1f1; /* Adjust as needed for hover effect */
}

@media (max-width: 1079px) {
    .rd-nav-submenu {
        position: static; /* Position it statically within the flow of the document */
        box-shadow: none; /* Remove shadow */
        margin-top: 0; /* Remove top margin */
        width: 100%; /* Make it full-width */
        display: none; /* Initially hide submenu */
    }
    .rd-nav-subsubmenu {
        position: static; /* Position it statically within the flow of the document */
        box-shadow: none; /* Remove shadow */
        margin-top: 0; /* Remove top margin */
        width: 100%; /* Make it full-width */
        display: none; /* Initially hide subsubmenu */
    }
    .rd-nav-item:hover .rd-nav-submenu,
    .rd-nav-subitem:hover .rd-nav-subsubmenu {
        display: block; /* Show submenu on hover */
    }
}


</style>
<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a class="brand" href="{{ route('home') }}"><img src="{{ asset('images/Horizontal_CSH_Logo.png') }}" alt="" width="233" style="height: 50px;"/></a></div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Share-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="{{$title != 'Core Support Hub'? route('home'):'' }}#home" style="text-decoration: none;">Home</a></li>
<li class="rd-nav-item">
    <a class="rd-nav-link" href="{{$title != 'Core Support Hub'? route('home'):'' }}#services" style="text-decoration: none;">Services</a>
    {{-- <ul class="rd-nav-submenu">
      <div class="col-3">  
        <li class="rd-nav-subitem"><h4><a class="rd-nav-sublink" href="#service1" style="text-decoration: none;">Technology Outsourcing</a></h4></li>
        <li class="rd-nav-subitem"><h4><a class="rd-nav-sublink" href="#service2" style="text-decoration: none;">Business Process Outsourcing</a></h4></li>
        <li class="rd-nav-subitem"><h4><a class="rd-nav-sublink" href="#service3" style="text-decoration: none;">Consulting </a></h4></li>
      </div>
    </ul> --}}
</li>

                  <li class="rd-nav-item"><a class="rd-nav-link" href="{{$title != 'Core Support Hub'? route('home'):'' }}#industries" style="text-decoration: none;">Industries</a></li>
    <li class="rd-nav-item">
    <a class="rd-nav-link" href="#" style="text-decoration: none;">Learn More</a>
    <ul class="rd-nav-submenu">
        <li class="rd-nav-subitem">
            <a class="rd-nav-sublink" href="#service1" id="itdropdown" style="text-decoration: none;">Technology Outsourcing ></a>
            <ul class="rd-nav-subsubmenu">
                <li class="rd-nav-subitem">
                    <a class="rd-nav-sublink" href="{{ route('brochures') }}?Type=ItManageServices" style="text-decoration: none;"> > IT Managed Services </a>
                </li>
                <li class="rd-nav-subitem">
                    <a class="rd-nav-sublink" href="{{ route('brochures') }}?Type=SoftDevelopment" style="text-decoration: none;"> > Software Development</a>
                </li>
            </ul>
        </li>
        <li class="rd-nav-subitem">
            <a class="rd-nav-sublink" href="{{ route('brochures') }}?Type=BusinessProcessOutsourcing" style="text-decoration: none;">Business Process Outsourcing</a>
        </li>
        <li class="rd-nav-subitem">
            <a class="rd-nav-sublink" href="{{ route('brochures') }}?Type=Consulting" style="text-decoration: none;">Consulting</a>
        </li>
    </ul>
</li>



                  <li class="rd-nav-item"><a class="rd-nav-link" href="#why-core-support-hub" style="text-decoration: none;">Why Core Support Hub?</a></li>
                  <li class="rd-nav-item"><a class="button button-secondary button-pipaluk" href="#contacts" style="text-decoration: none;">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

<script>
$(document).ready(function() {
    // Function to handle click on "Technology Outsourcing" link
    $('#itdropdown').click(function(e) {
        e.preventDefault(); // Prevent the link from navigating
        
        // Toggle visibility of subsubmenu
        $(this).siblings('.rd-nav-subsubmenu').toggle();
        
        // Hide other subsubmenus when this one is shown
        $('.rd-nav-subsubmenu').not($(this).siblings('.rd-nav-subsubmenu')).hide();
    });

    // Clicking anywhere outside the menu should close the subsubmenu
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.rd-navbar-nav').length) {
            $('.rd-nav-subsubmenu').hide();
        }
    });
});
</script>

