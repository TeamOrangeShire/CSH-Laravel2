<!DOCTYPE html>
<html class="wide wow-animation" lang="en" style="scroll-behavior: smooth;">
  <head>

    @include('Components.header', ['title'=>'Business Process Outsourcing - Core Support Hub'])
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  <style>
    .bullet{
      padding: 1px;
      border-radius: 50%;
      background:#222222;
      color: #c7ae6a;
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
   @include('Components.services_nav')


      </div>
 
      <!-- Cta-->
      <section class="section section-fluid bg-default" style="height: 650px;">
        <div class="parallax-container" data-parallax-img="https://teamorangeshire.github.io/Images/images/bpo.jpg" >
          <div class="parallax-content section-xl context-dark bg-overlay-68 bg-mobile-overlay">
            <div class="container">
              <div class="justify-content-end text-left">
                <div class="col-sm-7">
                  <h3 class="wow fadeInLeft" style="font-size:clamp(20px, 4vw,40px);">Business Process Outsourcing</h3>
                  <p class="wow fadeInLeft" style="font-size:clamp(9px, 3vw, 12px);">Business process permeates the entire organization, from back-office operations to front office and customer facing functions to support functions. Delivery of services to customers entail business processes and in more complex organizations, complex processes integrate the entire organization. A small defect in one of the many processes can significantly reduce efficiency of service and product delivery. In some cases, defects can cause significant loss of revenue and increased cost of poor quality. One of the more common customer dissatisfactions is having an inefficient business process which causes customer churn.</p>
                  </p>
                  <div class="group-sm group-middle group"><a class="button button-white-outline button-ujarak" href="#sub-service">See More</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <div id="demo" class="carousel slide" data-ride="carousel" >

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
      
        <div style="width: 100%; height: 80px;" id="sub-service"></div>
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row row-30 justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#customer-service')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/cus_service.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#customer-service">Customer Service</a></p>
                     
                    </div>
                  </article>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#sales-and-marketing')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/sales_marketing.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>                      
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#sales-and-marketing">Sales and Marketing</a></p>
                    </div>
                  </article>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#virtual-assistants')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/virtual_asst.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#virtual-assistants">Virtual Assistants</a></p>
                    </div>
                  </article>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#back-office-processing')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/back_office.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#back-office-processing">Back Office Processing</a></p>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row row-30 justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#accounting-and-bookkeeping')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/accounting.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#accounting-and-bookkeeping">Accounting and <br> Bookkeeping</a></p>
                     
                    </div>
                  </article>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#recruitment')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/recruitment.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#recruitment">Recruitment</a></p>
                    </div>
                  </article>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-3 clickable" onclick="bookmarking('#social-media-content-management')">
                  <article class="box-contacts" style="min-height: 290px;">
                    <div class="box-contacts-body">
                      <div>
                        <img src="{{ asset('images/socmed_mgt.png') }}" alt="" style="height: 5rem; width: 5rem;">
                      </div>
                      <div class="box-contacts-decor"></div>
                      <p class="box-contacts-link"><a href="#social-media-content-management">Social Media <br> Content Management</a></p>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
          </svg>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
          </svg>
        </a>
      
      </div> <br><br>

       
      <!-- BPO Subservices start -->
      <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3" ><div style="width: 100%; height: 50px;"id="customer-service"></div>
                <div class="bg-white rounded p-4">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn">
                            <img src="{{ asset('images/bpo1.jpeg') }}" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                            <div class="mb-4">
                                <h3 class="mb-3" >Customer Service</h3>
                                <p><Span class="boldText">Voice:</Span> Core Support Hub answers calls and queries from our customers which can range from product queries and orders to technical support.</p>
                                <p><span class="boldText">Chat:</span> Whether through your social media pages or through your website, our team members can provide customer service support to your customers via chat.</p>
                                <p><span class="boldText">Email:</span> Our team members can deliver customer service via email channel.</p>
                              </div>
                        </div>
                    </div>
                </div><div style="width: 100%; height: 50px;"id="sales-and-marketing"></div>
                <div class="bg-white rounded p-4" >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >Sales and Marketing</h3>
                              <p><span class="boldText">Sales:</span> Our sales services includes lead generation, appointment setting, sales enablement and support, inbound sales, customer retention, telesales among other services.</p>
                              <p><span class="boldText">Marketing:</span> We also provide a variety of marketing services including telemarketing, email and chat campaigns, social media content and marketing campaigns.</p>
                          </div>
                      </div>
                      <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/bpo2.jpg') }}" alt="">
                      </div>
                  </div>
                </div><div style="width: 100%; height: 50px;" id="virtual-assistants"></div>
                <div class="bg-white rounded p-4">
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn">
                          <img src="{{ asset('images/bpo3.jpg') }}" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3">Virtual Assistants</h3>
                              <p> We offer a host of remote assistance which includes the following:</p><br>
                              <ul>
                                <li><span class="bullet">✔</span> Administrative Assistants</li>
                                <li><span class="bullet">✔</span> Remote Executive Assistants</li>
                                <li><span class="bullet">✔</span> Ad Hoc Researchers</li>
                                <li><span class="bullet">✔</span> Social Media Assistants</li>
                                <li><span class="bullet">✔</span> Data Entry</li>
                                <li><span class="bullet">✔</span> Graphic Design</li>
                              </ul>
                          </div>
                      </div>
                  </div>
                </div><div style="width: 100%; height: 50px;"id="back-office-processing"></div>
                <div class="bg-white rounded p-4" >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3">Back Office Processing</h3>
                              <p>At Core Support Hub, we provide back-office processing work for you that can range from the most basic such as clerical work and data entry to more complex work such as data analysis, product tracking and management, computation-based work and project management. We can analyze and design a business process for you that can generate more value for your business.</p>
                          </div>
                      </div>
                      <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/bpo4.jpg') }}" alt="">
                      </div>
                  </div>
                </div><div style="width: 100%; height: 50px;"id="accounting-and-bookkeeping"></div>
                <div style="width: 100%; height: 60px;" ></div>
                <div class="bg-white rounded p-4 " >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn">
                          <img src="{{ asset('images/bpo5.jpg') }}" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >Accounting and Bookkeeping</h3>
                              <p>Core Support Hub provides cost effective solutions in accounting and bookkeeping such as the following services:</p>
                              <p><Span class="boldText">Basic Bookkeeping:</Span> Basic bookkeeping and journal entry work as well data sorting and general ledger management.</p>
                              <p><span class="boldText">General Accounting:</span> We provide general accounting services which includes the full accounting cycle from bookkeeping to sorting to financial statements preparation.</p>
                              <p><span class="boldText">Tax Preparation:</span> We provide individuals and businesses tax preparation services.</p>
                              <p><span class="boldText">Financial Planning and Analysis:</span> Our FP&A team members can provide a host of FP&A services including budget preparation, financial analysis and recommendations.</p>
                          </div>
                      </div>
                  </div>
                </div><div style="width: 100%; height: 50px;"id="recruitment"></div>
                <div class="bg-white rounded p-4" >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >Recruitment</h3>
                              <p>Core Support Hub can support your recruitment efforts by providing services such as candidate screening, calling potential candidates, scheduling the interview process, as well as calling for character references.</p>
                          </div>
                      </div>
                      <div class="col-lg-6 wow fadeIn">
                        <img src="{{ asset('images/bpo6.jpg') }}" alt="">
                      </div>
                  </div>
                </div><div style="width: 100%; height: 50px;"id="social-media-content-management" ></div>
                <div class="bg-white rounded p-4" >
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn">
                          <img src="{{ asset('images/bpo7.jpg') }}" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" style="text-align: left;">
                          <div class="mb-4">
                              <h3 class="mb-3" >Social Media Content Management</h3>
                              <p>Social media is a powerful marketing and branding tool and Core Support Hub can support your business by managing content and marketing campaigns and designing your social media strategy.</p>
                          </div>
                      </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
    <!-- BPO Subservices end -->
    @include('Components.footer')
    </div>


      <!-- Page Footer-->


   @include('Components.fab')

   
    <!-- Javascript-->
    @include('Components.scripts')
   
  </body>
</html>