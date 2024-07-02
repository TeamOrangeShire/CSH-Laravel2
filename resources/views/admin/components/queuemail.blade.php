<style>
    #progressEmailQueue{
        place-items: center;
        z-index: 100000;
        width: 100vw;
        height: 100vh;
        position: fixed;
        background-color: rgba(0,0,0,0.4);
        backdrop-filter: blur(3px);
        flex-direction: column;
    }
    .loaderMailQueue {
  position: relative;
  width: 20px;
  height: 20px;
  border-radius: 10px;
}

.loaderMailQueue div {
  width: 8%;
  height: 24%;
  background: rgb(128, 128, 128);
  position: absolute;
  left: 50%;
  top: 30%;
  opacity: 0;
  border-radius: 50px;
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
  animation: fade458 1s linear infinite;
}

@keyframes fade458 {
  from {
    opacity: 1;
  }

  to {
    opacity: 0.25;
  }
}

.loaderMailQueue .bar1 {
  transform: rotate(0deg) translate(0, -130%);
  animation-delay: 0s;
}

.loaderMailQueue .bar2 {
  transform: rotate(30deg) translate(0, -130%);
  animation-delay: -1.1s;
}

.loaderMailQueue .bar3 {
  transform: rotate(60deg) translate(0, -130%);
  animation-delay: -1s;
}

.loaderMailQueue .bar4 {
  transform: rotate(90deg) translate(0, -130%);
  animation-delay: -0.9s;
}

.loaderMailQueue .bar5 {
  transform: rotate(120deg) translate(0, -130%);
  animation-delay: -0.8s;
}

.loaderMailQueue .bar6 {
  transform: rotate(150deg) translate(0, -130%);
  animation-delay: -0.7s;
}

.loaderMailQueue .bar7 {
  transform: rotate(180deg) translate(0, -130%);
  animation-delay: -0.6s;
}

.loaderMailQueue .bar8 {
  transform: rotate(210deg) translate(0, -130%);
  animation-delay: -0.5s;
}

.loaderMailQueue .bar9 {
  transform: rotate(240deg) translate(0, -130%);
  animation-delay: -0.4s;
}

.loaderMailQueue .bar10 {
  transform: rotate(270deg) translate(0, -130%);
  animation-delay: -0.3s;
}

.loaderMailQueue .bar11 {
  transform: rotate(300deg) translate(0, -130%);
  animation-delay: -0.2s;
}

.loaderMailQueue .bar12 {
  transform: rotate(330deg) translate(0, -130%);
  animation-delay: -0.1s;
}

</style>

<div id="progressEmailQueue" style="display: none">
    <div class="card mx-auto shadow-sm rounded w-50 bg-secondary" >
        <div class="card-header d-flex justify-content-between align-items-center border-0">
            
            <div class="d-flex gap-2">
              <i class="icon-info fs-3"></i>
              <h3 class="h6 lead mb-0">Progress</h3>
            </div>
            <button title="Close" id="closeProgressMailButton" onclick="Support.CloseDiv('progressEmailQueue')" style="display: none" class="border-0 bg-transparent card-title fs-3"><i class="icon-x-circle"></i></button>
            <button title="Minimize" id="minimizeProgressMailButton" onclick="Support.Minimize()" class="border-0 bg-transparent card-title fs-3"><i class="icon-minus-circle"></i></button>
        </div>
        <div class="card-body">
            <p class="card-text text-muted small mb-2">
               Current Progress: <span id="progressSentMail">0</span>/<span id="progressTotalMail">0</span> Mails
            </p>
            <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-success" role="progressbar" id="massMailProgressBar" style="width: 0%; transition: width 0.2s" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="d-flex gap-2"> <div class="loaderMailQueue" id="loaderMailQueueID">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                  <div class="bar4"></div>
                  <div class="bar5"></div>
                  <div class="bar6"></div>
                  <div class="bar7"></div>
                  <div class="bar8"></div>
                  <div class="bar9"></div>
                  <div class="bar10"></div>
                  <div class="bar11"></div>
                  <div class="bar12"></div>
              </div><span class="small text-muted"><span id="massMailProgressPercentage">0</span>% Complete </span></div>
                <button class="btn btn-link text-decoration-none p-0 small text-primary" onclick="Support.ShowDetails(this, 'QueueDetails')">Show Details</button>
            </div>

            <div class="card mb-2 mt-2" style="display: none" id="QueueDetails">
                <div class="card-body">
                    <ul class="list-group" id="progressQueueMailList">

                    </ul>
                </div>
            </div>

        </div>
    </div>
    
</div>
