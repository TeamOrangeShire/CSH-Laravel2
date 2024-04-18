<!DOCTYPE html>
<html class="wide wow-animation" lang="en" >
  <head>
    @include('Components.header', ['title'=>'Core Support Hub'])
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>

    <div class="snackbar-div" id="snackbar-div"><span class="snackbar-text" id="snackbar-text"></span></div>

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
      @include('Components.nav')

        <!-- Swiper-->
        <section class="section swiper-container swiper-slider swiper-slider-classic" data-loop="true" data-autoplay="4859" data-simulate-touch="true" data-direction="vertical" data-nav="false">
          <div class="swiper-wrapper text-center">
            <div class="swiper-slide slider1">
              <div class="swiper-slide-caption section-md">
                <div class="container text-left">
                  <h1 style="margin-top: -100px; font-size:clamp(1.1rem, 3.2vw, 4rem);" data-caption-animate="fadeInLeft" data-caption-delay="0">Core Support Hub</h1>
                  <p class="" style="font-size: clamp(0.7rem, 1vw, 1.3rem); " data-caption-animate="fadeInRight" data-caption-delay="100">Core Support Hub: Your Partner of choice for Small and Midsize Enterprises</p>
                  <a class="button button-primary button-ujarak" href="#services"  data-caption-animate="fadeInUp" data-caption-delay="200">Learn More</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide slider2" loading="lazy">
              <div class="swiper-slide-caption section-md">
                <div class="container text-left">
                  <h1 data-caption-animate="fadeInLeft" style="font-size:clamp(1.1rem, 3.2vw, 4rem);" data-caption-delay="0">Outsourcing: An extension of your organization</h1>
                  <p class="" style="font-size:clamp(0.7rem, 1vw, 1.3rem);" data-caption-animate="fadeInRight" data-caption-delay="100">A partnership where we become an extension of your team.</p>
                  <a class="button button-primary button-ujarak" href="#services"  data-caption-animate="fadeInUp" data-caption-delay="200">Learn More</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide slider3">
              <div class="swiper-slide-caption section-md">
                <div class="container text-left">
                  <h1 data-caption-animate="fadeInLeft" style="font-size:clamp(1.1rem, 3.2vw, 4rem);" data-caption-delay="0">Let's design the outsourcing engagement</h1>
                  <p class="" style="font-size:clamp(0.7rem, 1vw, 1.3rem);" data-caption-animate="fadeInRight" data-caption-delay="100">Consulting is at the heart of our partnerships</p>
                  <a class="button button-primary button-ujarak" href="#services"  data-caption-animate="fadeInUp" data-caption-delay="200">Learn More</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Swiper Pagination-->
          <div class="swiper-pagination__module">
            <div class="swiper-pagination__fraction"><span class="swiper-pagination__fraction-index">00</span><span class="swiper-pagination__fraction-divider">/</span><span class="swiper-pagination__fraction-count">00</span></div>
            <div class="swiper-pagination__divider"></div>
            <div class="swiper-pagination"></div>
          </div>
        </section>

      </div>
      <!-- See all services-->
      <section class="section section-sm section-first bg-default text-center" id="services" style="padding-top: 100px;" >
        <div class="container">
          <div class="row row-40 justify-content-center"  >
            <div class="col-lg-12 col-xl-12" >
              <h2 data-wow-delay=".1s" class="wow fadeInLeft">Our Services</h2>
           
              <div class="row row-30" >
                
                <div class="col-sm-3 wow fadeInRight" data-wow-delay=".1s" id="bpo_card">
                  <article class="box-icon-modern box-icon-modern-2 bpo_background card" >

              
                      <div class="box-icon-modern-icon "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="fill: #c7ae6a;"><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/></svg></div>
                    <h5 class="box-icon-modern-title text-white"><a href="#">Business Process<br>Outsourcing (BPO)</a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <!-- <p class="text-white" style="text-decoration: underline;">Learn More</p> -->
                      <div class="card__content">
                        <p style="font-size:clamp(16px, 1vw, 24px);" class="card__title">BPO</p>
                        <p style="font-size:clamp(0.7rem, 1vw, 1rem);" class="card__description">Core Support Hub is an extension of your
                          business. We partner with you to know your
                          business and our team members deliver services
                          to your customers as true representatives of your
                          brand.</p>
                        <a href="{{ route('bpo') }}" class="learn_more">
                         Learn More
                        </a>
                      </div>
           
                  </article>
                </div><i ></i>
                <div class="col-sm-3 wow fadeInRight" data-wow-delay=".1s" id="it_manage_card">
                  <article class="box-icon-modern box-icon-modern-2 ims_backgrounds card ">
                    <div class="box-icon-modern-icon ">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="fill: #c7ae6a;"><path d="M176 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64c-35.3 0-64 28.7-64 64H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64c0 35.3 28.7 64 64 64v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448c35.3 0 64-28.7 64-64h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V176h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448c0-35.3-28.7-64-64-64V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H280V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H176V24zM160 128H352c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32zm192 32H160V352H352V160z"/></svg></div>
                    <h5 class="box-icon-modern-title text-white"><a href="#">Technology<br>Outsourcing</a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <!-- <p class="text-white" style="text-decoration: underline;">Learn More</p> -->
                    <div class="card__content">
                      <p style="font-size:clamp(16px, 1vw, 24px);" class="card__title">Technology Outsourcing</p>
                      <p style="font-size:clamp(0.7rem, 1vw, 1rem);" class="card__description">Core Support Hub provides managed services for
                        your IT needs whether it's for providing remote
                        desktop support for your computers and system
                        administration to remotely monitor your
                        network to ensure your connectivity is performing
                        as expected.</p>
                      <a href="{{ route('technology') }}" class="learn_more">
                        Learn More
                       </a>
                    </div>
             
                 </article>
                </div>
       
                <div class="col-sm-3 wow fadeInRight" data-wow-delay=".3s" id="consulting_card">
                  <article class="box-icon-modern box-icon-modern-2 cons_background card">
                    <div class="box-icon-modern-icon "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"  style="fill: #c7ae6a;"><path d="M272 384c9.6-31.9 29.5-59.1 49.2-86.2l0 0c5.2-7.1 10.4-14.2 15.4-21.4c19.8-28.5 31.4-63 31.4-100.3C368 78.8 289.2 0 192 0S16 78.8 16 176c0 37.3 11.6 71.9 31.4 100.3c5 7.2 10.2 14.3 15.4 21.4l0 0c19.8 27.1 39.7 54.4 49.2 86.2H272zM192 512c44.2 0 80-35.8 80-80V416H112v16c0 44.2 35.8 80 80 80zM112 176c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-61.9 50.1-112 112-112c8.8 0 16 7.2 16 16s-7.2 16-16 16c-44.2 0-80 35.8-80 80z"/></svg></div>
                    <h5 class="box-icon-modern-title text-white"><a href="#">Consulting</a></h5>
                    <div class="box-icon-modern-decor"></div>
                     <!-- <p class="text-white" style="text-decoration: underline;">Learn More</p> -->
                    <div class="card__content">
                      <p style="font-size:clamp(16px, 1vw, 24px);" class="card__title">Consulting</p>
                      <p style="font-size:clamp(0.7rem, 1vw, 1rem);" class="card__description">At the heart of Core Support Hub’s business model is
                        partnering with our clients to help build processes,
                        design workflows and create solutions to unlock value in
                        their organizations.</p>
                      <a href="{{ route('consulting') }}" class="learn_more">
                        Learn More
                       </a>
                    </div>
                
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <div class="col-lg-6 col-xl-12 align-self-center small-show">
        <div class="row row-30 justify-content-center">
          <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft">
            <div style="position: relative; display: inline-block;">
              <img src="{{ asset('images/slide1.png') }}" alt="" style="width: 90%; height: auto;">
              <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.685); display: flex; justify-content: center; align-items: center; border-radius:25px;">
                <a class="" href="{{ asset('images/slide1.png') }}" data-lightgallery="item"><h4 style="color: white;">view</h4></a>
              </div>
            </div>
            
            
        </div>
          <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".2s">
            <div style="position: relative; display: inline-block;">
              <img src="{{ asset('images/slide2.png') }}" alt="" style="width: 90%; height: auto; ">
              <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.685); display: flex; justify-content: center; align-items: center; border-radius:25px;">
                <a class="" href="{{ asset('images/slide2.png') }}" data-lightgallery="item"><h4 style="color: white;">view</h4></a>
              </div>
            </div>
          </div>
        </div>  
      </div>

<section  class="section section-sm bg-default wow fadeInRight big-show" data-wow-delay=".2s"   id="images-outsource">
 <img style="width: 80%; height: auto;" src="{{ asset('images/slide1.png') }}" alt="outsourcing engagement">
 <img style="width: 80%; height: auto;" src="{{ asset('images/slide2.png') }}" alt="outsourcing engagement">
</section>
      <!-- Latest blog posts-->
      <div style="width: 100%; height: 50px; margin-bottom:3.5%;" id="industries">

      </div>

      <div class="container">
        <h2>Industries and Segments Serviced</h2>
        <p>Core Support Hub designs each service to fit your respective industry and segment.</p>
        <div class="row justify-content-md-center" style="">

          <div class="col col-lg-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/banking3.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">BFSI (Banking, Finance Services and Insurance)</p>
              </div>
            </div>
          </div>

          <div class="col col-lg-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/e_commerce.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Retail and eCommerce</p>
              </div>
            </div>
          </div>

          <div class="col col-lg-3 d-flex justify-content-center" >
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/travel_hospitality.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Travel and Hospitality</p>
              </div>
            </div>
          </div>

          <div class="col col-lg-3 d-flex justify-content-center" >
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/health_care.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Healthcare</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row justify-content-md-center" style="margin-top:0px;">

          <div class="col col-lg-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/logis.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Logistics</p>
              </div>
            </div>
          </div>

          <div class="col col-lg-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/small_bus.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Small Businesses</p>
              </div>
            </div>
          </div>

          <div class="col col-lg-3 d-flex justify-content-center" >
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/contract.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Independent Contractors</p>
              </div>
            </div>
          </div>

          <div class="col col-lg-3 d-flex justify-content-center" >
            <div class="card" style="width: 18rem; height:280px;">
              <div class="p-2">
                <img src="{{asset('images/start_up.png')}}" alt="...">
            </div>
              <div class="card-body">
                <p style="font-size: clamp(12px, 1vw, 12px)">Start Ups (MVP)</p>
              </div>
            </div>
          </div>

        </div>
      </div>



      <div style="width: 100%; height: 90px;" id="why-core-support-hub">

      </div>
      
           <!-- Cta-->
           <section class="section section-fluid bg-default mb-4" style="margin-top:5%;">
            
            <div class="row  d-flex align-items-center">
              <div class="col-md-3 wow fadeInLeft" data-wow-delay="0.4s" >
                <img src="{{ asset('images/why_about_us.png') }}" style="width: 80%;" alt="">
              </div>
              <div class="col-md-9 wow fadeInRight w-a-u-text"  style="text-align: left;" data-wow-delay="0.4s">
                <h2 class="w-a-u" style="font-size: 2rem;">Why Core Support Hub?</h2>
                <p class="w-a-u" style="margin-right:5%">Unlocking the full potential of your organization requires more than just outsourcing-it demands a strategic partnership that understands your unique challenges and objectives.</p>
                <p class="w-a-u" style="margin-right:5%">At Core Support Hub, we offer more than just services; we provide comprehensive solutions tailored to your specific needs. Our unwavering commitment to understanding your business processes, leveraging technology effectively, and delivering continuous improvements sets us apart.</p>
                <p class="w-a-u" style="margin-right:5%">Choosing Core Support Hub means choosing a trusted partner dedicated to your success. Join us in transforming your operations and unlocking unparalleled value today.</p>
              </div>
            </div>
                </section>
           <section class="section section-fluid bg-default" >
         
             <div class="parallax-container" style="height: 75vh;" data-parallax-img="https://teamorangeshire.github.io/Images/images/build.jpg">
               <div class="parallax-content section-xl context-dark bg-mobile-overlay">
                 <div class="container">
                   <div class="row justify-content-end text-right">
                     <div class="col-sm-7">
                       <h3 style="margin-top: -60px"class="wow fadeInLeft">About Core Support Hub</h3>
                       <p style="font-size:clamp(0.6rem, 1vw, 1rem);">Core Support Hub is a startup outsourcer founded by industry veterans in business process outsourcing, financial services, manufacturing, technology services and the academe. We believe that outsourcing should return to its core objective which is to be a true extension of the client's business, with a shared purpose and mission.
                       </p>
                       <div class="group-sm group-middle group justify-content-end"><a class="button button-white-outline button-ujarak" href="#images-outsource">Learn More</a></div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </section>
     
        
     
           <!-- Meet The Team-->
           <section class="section section-sm section-fluid bg-default" id="team">
             <div class="container-fluid">
               <h2>Leadership</h2>
               <p class=" wow fadeInRight" data-wow-delay=".1s" style="margin: 5%">The leadership team has a combined experience of more than 80 years of multiple vertical and functional roles. We are located in Bacolod City, Philippines with satellite offices in Manila, Philippines and Australia.</p>
         
               <div class="row row-sm row-30 justify-content-center">
                
                 <div class="col-md-6 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay=".1s">
                   <div class="linkedInDiv">
                     <a href="https://www.linkedin.com/in/albertpimentel/" class="icon fa-brands fa-linkedin linkedin"></a>
                    </div>
                   <article class="team-classic team-classic-lg"><a class="team-classic-figure" href="https://www.linkedin.com/in/albertpimentel/"><img src="{{ asset('images/sir_albert.png') }}" alt="" width="420" height="424"/></a>
                     <div class="team-classic-caption">
                       <h4 class="team-classic-name"><a href="https://www.linkedin.com/in/albertpimentel/" style="font-size: 1rem;" >Albert Dominic Pimentel</a></h4>
                       <p class="team-classic-status" style="font-size: 12px"> Founder and CEO</p>
                     </div>
                   </article>
                  
                 </div>
                 <div class="col-md-6 col-lg-5 col-xl-3 wow fadeInRight">
                   <!-- Team Classic-->
                   <div class="linkedInDiv">
                    <a href="https://www.linkedin.com/in/jose-leo-gamboa-redoblo-phd-4841b3100/" class="icon fa-brands fa-linkedin linkedin"></a>
                   </div>
               
                   <article class="team-classic team-classic-lg"><a class="team-classic-figure" href="https://www.linkedin.com/in/jose-leo-gamboa-redoblo-phd-4841b3100/"><img   src="{{ asset('images/sir_leo.png') }}" alt="" width="420" height="424"/></a>
             
                     <div class="team-classic-caption" >
                       <h4 class="team-classic-name"><a style="font-size: 1rem;" href="https://www.linkedin.com/in/jose-leo-gamboa-redoblo-phd-4841b3100/">Jose Leo Redoblo, PhD.</a></h4>
                       <p class="team-classic-status" style="font-size:12px">Head of Technology & Co-founder</p>
                     </div>
                     
                   </article>
               
                 </div>
                 <div class="col-md-6 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                   <div class="linkedInDiv">
                     <a href="https://www.linkedin.com/in/sava-trifunovic-1251741a/" class="icon fa-brands fa-linkedin linkedin"></a>
                    </div>
                   <article class="team-classic team-classic-lg"><a class="team-classic-figure" href="https://www.linkedin.com/in/sava-trifunovic-1251741a/"><img   src="{{ asset('images/sir_sava.png') }} " alt="" width="420" height="424"/></a>
                     <div class="team-classic-caption">
                       <h4 class="team-classic-name"><a style="font-size: 1rem;"  href="https://www.linkedin.com/in/sava-trifunovic-1251741a/">Sava Trifunovic</a></h4>
                       <p class="team-classic-status" style="font-size:12px"> Senior Executive Consultant</p>
                    
                     </div>
                   </article>
                 
                 </div>
               
               </div>
             </div>
           </section>
   
 <div id="contacts" style="width: 100%; height: 70px;"></div>
 <section class="section section-sm section-last bg-default text-center "  >
  <div class="title-classic-title">
    <h3>Get in touch with us</h3>
  </div>
  
  <div  class=" d-flex align-items-stretch row">
    <div class="col-md-4 text-left p-5">
      <div class="title-classic-title ">
        <h3>Contact Us</h3>
      </div>
         <p class="mb-2 mt-2">If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
         <div class="d-flex flex-column mt-4 text-left">
          <a href="https://www.linkedin.com/company/core-support-hub/" class="mb-2"><i class="fa-brands fa-linkedin"></i>: Core Support Hub</a>
          <a href="mailto:info@coresupporthub.com" class="mb-2"><i class="fa-solid fa-envelope"></i>: info@coresupporthub.com</a>
        </div>
        
    </div>
    
    <div class="col-md-6 d-flex align-items-stretch small-margin" >
      
      <form class="rd-form rd-form-variant-2 rd-mailform text-center" data-form-output="form-output-global" data-form-type="contact" method="post" id="contactSubmitForm">
        @csrf
        <div class="row row-14 gutters-14">
          <div class="col-md-6">
            <div class="form-wrap">
              <input class="form-input" id="contact-name-2" type="text" name="name" >
              <label class="form-label" for="contact-name-2">Your Name</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-wrap">
              <input class="form-input" id="contact-email-2" type="email" name="email">
              <label class="form-label" for="contact-email-2">E-mail</label>
            </div>
          </div>
    
          <div class="col-md-12">
            <div class="form-wrap">
              <label class="form-label" for="contact-message-2">Message</label>
              <textarea class="form-input textarea-lg" id="contact-message-2" name="message" ></textarea>
            </div>
          </div>
        </div>
        <button class="button button-primary button-pipaluk bt-loader" type="button" id="submitButton" onclick="SendMessage()">Send Message</button>
      </form>
    </div>
  </div>
</section>



      <!-- Page Footer-->
   @include('Components.footer')

    </div>
 @include('Components.scripts')

 <script>
    function SendMessage() {
   const submit = document.getElementById('submitButton');
   submit.innerHTML = '';

   submit.innerHTML = `<div class="dot-spinner">
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
  <div class="dot-spinner__dot"></div>
</div>`;

    event.preventDefault();
     var formData = $('form#contactSubmitForm').serialize();
 
     $.ajax({
         type: 'POST',
         url: "{{ route('sendMessage') }}",
         data: formData,
         success: function(response) {

       if(response.status === 'success'){
        submit.innerHTML = '';
        submit.innerHTML = '<i>Message Sent</i>';

        const snackDiv = document.getElementById('snackbar-div');
        const snackText = document.getElementById('snackbar-text');
        document.getElementById('contact-name-2').value = null;
        document.getElementById('contact-email-2').value = null;
        document.getElementById('contact-message-2').value = null;

        submit.disabled = true;
        snackDiv.style.display = 'flex';
        snackText.textContent = 'Message Sent Successfully'
        setTimeout(() => {
          snackDiv.style.animation = "snackOut .5s";
          setTimeout(() =>{
           snackDiv.style.display = 'none';
          }, 500);
        }, 3000);
       }else{
        submit.innerHTML = '';
        submit.innerHTML = 'Send Message';
        const snackDiv = document.getElementById('snackbar-div');
        const snackText = document.getElementById('snackbar-text');

        snackDiv.style.display = 'flex';
        snackText.textContent = 'Please Complete the form to send message!'
        setTimeout(() => {
          snackDiv.style.animation = "snackOut 1s";
          setTimeout(() => {
           snackDiv.style.display = 'none';
           snackDiv.style.animation = "";
          }, 1000);
        }, 3000);
       }
         
         }, 
         error: function (xhr) {

             console.log(xhr.responseText);
         }
     });
 }
 </script>
  </body>
</html>