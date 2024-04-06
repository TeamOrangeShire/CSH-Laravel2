<!DOCTYPE html>
<html style="scroll-behavior: smooth;" class="wide wow-animation" lang="en">
  <head>
    @include('Components.header', ['title'=>'Consulting - Core Support Hub'])
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
      <section class="section section-fluid bg-default" >
        <div class="parallax-container" data-parallax-img="{{ asset('images/consulting.jpg') }}" >
          <div class="parallax-content section-xl context-dark bg-overlay-68 bg-mobile-overlay">
            <div class="container">
              <div class="justify-content-end text-left">
                <div class="col-sm-7">
                  <h3 class="wow fadeInLeft">Consulting</h3>
                  <p class="wow fadeInLeft">At the core of the outsourcing relationship is Core Support Hub’s Consulting offering. For us to be able to build the right business process outsourcing solution, the right IT Managed Services arrangement and the right Software Development solution, having a comprehensive consulting engagement is key. Consulting is a vital aspect of the partnership between Core Support Hub and our clients. Consulting gives us insights into our clients’ business, the ability to generate the right solutions and help us execute the best outsourcing partnership with our clients. Consulting also gives us insights to craft constant improvements to the outsourcing services as well as provide solutions for new challenges of our clients.
                  </p>
                  <div class="group-sm group-middle group wow fadeInLeft"><a class="button button-white-outline button-ujarak" href="#offers">See More</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- content start -->




      <!-- content end -->
      <!-- Meet The Team-->
     <div id="offers" style="width: 100%; height: 50px;"></div>
     <!-- Contact information-->
      <section class="section section-sm bg-default" >
        <div class="container">
          <h3>What do we do for Consulting</h3>
          <p>Our team of analysts and project managers will partner with your organization to create solutions for the following:
          </p>
          <div class="row row-30 justify-content-center">
           
            <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#business-process')">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <img src="{{ asset('images/Bus_process.png') }}" alt=""style="width:40%; padding-top:60px;">
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#business-process">Business Process</a></p>
                </div>
             
              </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#technology')" >
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <img src="{{ asset('images/technology.png') }}" alt=""style="width:40%; padding-top:60px;">
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#technology">Technology</a></p>
                </div>
              
              </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#business-insights')">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <img src="{{ asset('images/analytics.png') }}" alt=""style="width:40%; padding-top:70px;">
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link" style="margin-top: 30px;"><a href="#business-insights">Business Insights</a></p>
                </div>
              
              </article>
            </div>
         
          </div>
          <!-- grid row  -->
         
        </div>
      </section>

    
      <!-- Bottom Banner-->
      
      <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3" >
              <div style="width: 100%; height: 50px;" id="business-process"></div>
                <div class="bg-white rounded p-4">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn">
                            <img src="{{ asset('images/process.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                            <div class="mb-4">
                                <h3 class="mb-3" >Business Process</h3>
                               
                                <p>We partner with your teams to design business
                                  processes, reengineer workflows, provide insights
                                  and recommendations to unlock value within your
                                  business.</p>
                              </div>
                        </div>
                    </div>
                </div>
                <div style="width: 100%; height: 50px;" id="technology"></div>
                <div class="bg-white rounded p-4" >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >Technology</h3>
                              <p>We team up with your organization to craft
                                tailored software solutions that streamline
                                operations and support your IT needs, from
                                strategic planning to customer delivery and
                                back-office processes.</p>
                           
                          </div>
                      </div>
                      <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/software2.jpeg') }}" alt="">
                      </div>
                  </div>
                </div>
                <div style="width: 100%; height: 50px;" id="business-insights"></div>
                <div class="bg-white rounded p-4" >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn">
                          <img src="{{ asset('images/bus_insights.jpg') }}" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3">Business Insights</h3>
                            
                           <p>We work with your teams to analyze all available
                            and relevant information to get timely, reliable and
                            actionable insights about your business and the
                            market. This service includes descriptive,
                            diagnostic, predictive, and prescriptive analytics,
                            visualizing your data for an enhanced
                            understanding of the trend and efficient reporting.</p>
                          </div>
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
 
    <!-- Javascript-->
    @include('Components.scripts')
  </body>
</html>