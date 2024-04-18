<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="scroll-behavior: smooth;">
  <head>
    @include('Components.header', ['title'=>'Technology Outsourcing- Core Support Hub'])
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
   
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
    @include('Components.services_nav')
      </div>

      <!-- Cta-->
      <section class="section section-fluid bg-default" style="height: 650px;">
        <div class="parallax-container" data-parallax-img="https://img.freepik.com/free-vector/business-infographic-with-image_23-2148340472.jpg?t=st=1713418302~exp=1713421902~hmac=ae18c369f67e855034891a6684b85c2e471328b380832d58700b609c49484f4d&w=996" style="height: 650px;">
          <div class="parallax-content section-xl context-dark bg-overlay-68 bg-mobile-overlay">
            <div class="container">
              <div class="justify-content-end text-left">
                <div class="col-sm-7">
                  <h3 class="wow fadeInLeft">Technology Outsourcing</h3>
                  <p class="wow fadeInRight">
                    Technology is a critical aspect of any organization and business. Technology enables the organization through facilitating real-time information sharing across functions and groups, creating efficiencies through automation, providing the necessary tools to unlock value ensuring the right delivery of services and products to customers. Having the right partner is critical for technology outsourcing to be successful.
                  </p>
                  <div class="group-sm group-left group justify-content-end"><a class="button button-white-outline button-ujarak" href="#srvcs">See More</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact information-->
      <div style="width: 100%; height: 50px;" id="srvcs"></div>
      <section class="section section-sm bg-default">
        <div class="container">
          <h2> IT Services Offered</h2>
          <p >
            Core Support Hub provides managed services for your IT needs whether it's for providing remote desktop support for your computers and system administration to remotely monitoring your network to ensure your connectivity is performing as expected.
          </p>
          <div class="row row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4 clickable" onclick="bookmarking('#it-managed-services')">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <img src="{{ asset('images/itcloud_icon.png') }}" alt=""style="width:40%; padding-top:60px;">
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#it-managed-services">IT Managed Services</a></p>
                </div>
              
              </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 clickable" onclick="bookmarking('#software-development')">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <img src="{{ asset('images/custom_web.png') }}" alt=""style="width:40%; padding-top:60px;">
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#software-development">Software Development</a></p>
                </div>
              
              </article>
            </div>
        
          </div>
          <!-- grid row  -->
         
        </div>
      </section>


      <div style="width: 100%; height: 50px;"  id="it-managed-services"></div>

      <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3" >
              <h2 class="wow fadeInLeft">IT Managed Services</h2>
                <div class="bg-white rounded p-4"id="customer-service">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn">
                            <img src="{{ asset('images/network-design.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                            <div class="mb-4">
                                <h3 class="mb-3" >Network Design and Solution</h3>
                                <p><Span class="boldText">End User Services</Span> </p>
                                <p><span class="boldText">Inforsecurity Services</span> </p>
                                <p><span class="boldText">Managed Wireless and Mobile Computing</span></p>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded p-4" id="sales-and-marketing">
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >VOIP Designs & Solutions</h3>
                              <p><span class="boldText">Managed Communication Services</span></p>
                           
                          </div>
                      </div>
                      <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/VOIP.jpg') }}" alt="">
                      </div>
                  </div>
                </div>
                <div class="bg-white rounded p-4" id="virtual-assistants">
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn">
                          <img src="{{ asset('images/r_desktop.webp') }}" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3">Technology Support</h3>
                            
                              <ul>
                                <li class="boldText">Network Support</li>
                                <li class="boldText">VoIP Support</li>
                                <li class="boldText">Managed IT Staff Support</li>
                                
                              </ul>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="bg-white rounded p-4" id="back-office-processing">
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3">Managed Print Services</h3>
                              
                          </div>
                      </div>
                      <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/print-min.jpg') }}" alt="">
                      </div>
                  </div>
                </div>
           
              
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 50px;"  id="software-development"></div>


    <div class="container-xxl py-5">
      <div class="container">
          <div class="bg-light rounded p-3" >
            <h2 class="wow fadeInLeft">Software Development</h2>
              <div class="bg-white rounded p-4"id="customer-service">
                  <div class="row g-5">
                      <div class="col-lg-6 wow fadeIn">
                          <img src="{{ asset('images/app-dev.jpg') }}" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >App Development</h3>
                             
                            </div>
                      </div>
                  </div>
              </div>
              <div class="bg-white rounded p-4" id="sales-and-marketing">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                        <div class="mb-4">
                            <h3 class="mb-3" >Custom Software Development</h3>
                          
                         
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn">
                      <img src="{{ asset('images/soft_dev2.jpg') }}" alt="">
                    </div>
                </div>
              </div>
              <div class="bg-white rounded p-4" id="virtual-assistants">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/web-dev.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                        <div class="mb-4">
                            <h3 class="mb-3">Website Design & Development</h3>
                        
                        </div>
                    </div>
                </div>
              </div>
              <div class="bg-white rounded p-4" id="back-office-processing">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                        <div class="mb-4">
                            <h3 class="mb-3">Startup MVP(Minimum Viable Product)</h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn">
                      <img src="{{ asset('images/mvp.jpg') }}" alt="">
                    </div>
                </div>
              </div>
         
            
          </div>
      </div>
  </div>
  @include('Components.footer')
      
    </div>
      <!-- Page Footer-->

     @include('Components.fab')

     @include('Components.scripts')
  </body>
</html>