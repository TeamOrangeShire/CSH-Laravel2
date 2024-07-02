<style>
    #minimizeProgressEmailQueue{
        z-index: 100000;
        width: 100vw;
        height: 10vh;
        justify-content: end;
        position: fixed;
        bottom: 0;
    }

    .minimizeProgressContent{
      background-color: #222222;
      width: 25%;
      height: 100%; 
    }

</style>
<div id="minimizeProgressEmailQueue" style="display: none;" >
   <div id="minimizeProgressContent" class="minimizeProgressContent rounded shadow-sm card">
    <div class="card-header d-flex justify-content-between align-items-center border-0 m-0">
      
          <div class="d-flex gap-2">
            <div class="loaderMailQueue" id="loaderMailQueueID2">
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
            </div>
            <h3 class="h6 lead mb-0">In Progress</h3>
          </div>
          <p class="h6 lead mb-0">Mail Sent:  <span id="minimizeProgressSentMail">0</span>/<span id="minimizeProgressTotalMail">0</span></p>
          <button id="closeMinimizeProgressMailButton" onclick="Support.CloseDiv('minimizeProgressEmailQueue')" title="Close" style="display: none" class="border-0 bg-transparent card-title fs-3"><i class="icon-x-circle"></i></button>
          <button id="maximizeProgressMailButton" title="Maximize" onclick="Support.Maximize()" class="border-0 bg-transparent card-title fs-5"><i class="icon-maximize-2"></i></button>
    </div>
   </div>
</div>