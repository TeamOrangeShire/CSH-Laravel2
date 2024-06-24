@php
    $smtpConfig = App\Models\CshEmailConfig::where('user_id', $user)->first();
@endphp

<div class="modal fade" id="updateLead" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button style="filter: brightness(0) invert(1);" type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="updateLead" method="POST">
                        @csrf
                        <input type="hidden" name="pl_id" id="pl_id">
                        <!-- Row start -->
                        <div class="row gx-2">
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" name="companyName" id="upCompanyName" class="form-control"
                                        placeholder="Company Name" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Contact Name</label>
                                    <input type="text" name="name" id="upName" class="form-control"
                                        placeholder="Contact Name" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="upEmail"
                                        placeholder="Contact Email" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Service Offer</label>
                                    <select name="serviceOffer" id="upServiceOffer" class="form-select">
                                        <option value="null" disabled selected> -------Select Service------- </option>
                                        <option value="IT Service">IT Service</option>
                                        <option value="BPO">BPO</option>
                                        <option value="Software">Software</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Contacts Position</label>
                                    <input name="position" type="text" id="upPosition" class="form-control"
                                        placeholder="Contacts Position" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">No. of Employees</label>
                                    <input type="text" name="employees" id="upEmployees" class="form-control"
                                        placeholder="No. of Employees" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="upStatus" class="form-select">
                                        <option value="null" disabled selected> -------Select Status------- </option>
                                        <option value="Lead">Lead</option>
                                        <option value="Prospect">Prospect</option>
                                        <option value="Discussion">Discussion</option>
                                        <option value="Proposal">Proposal</option>
                                        <option value="Negotiation">Negotiation</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Won">Won</option>
                                        <option value="Lost">Lost</option>
                                        <option value="DNC">DNC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Email Status</label>
                                    <select name="emailStatus" id="upEmailStatus" class="form-select">
                                        <option value="null"> ------Not Set------ </option>
                                        <option value="Not Verified">Not Verified</option>
                                        <option value="Verify">Verified</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-12 mt-4 mb-4">
                                <div class="table-responsive">
                                    <table id="sentEmail" class="table table-bordered table-striped align-middle m-0">
                                        <thead>
                                            <tr>
                                                <th>Email Level</th>
                                                <th>Date Sent</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex gap-2 justify-content-end">
                                    <button type="button" id="closeUpdatelead" data-bs-dismiss="modal"
                                        class="btn btn-outline-light">
                                        Cancel
                                    </button>
                                    <button
                                        onclick="Pipeline.UpdateLead('{{ route('updateLead') }}', '{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}', '{{ route('getLeadDetails') }}')"
                                        type="button" class="btn btn-success">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="addLeads" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Leads</h5>
                <button id="closeAddLead" style="filter: brightness(0) invert(1);" type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="addLeadForm" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user }}">
                        <div class="row mb-3">
                            <label for="companyNameAdd" class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="companyName" class="form-control" id="companyNameAdd" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nameAdd" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="nameAdd" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="emailAdd" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="emailAdd" />
                            </div>
                        </div>

                        <div class="w-100 d-flex justify-content-end">
                            <button
                                onclick="Pipeline.AddLead('{{ route('addLead') }}', '{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}', '{{ route('getLeadDetails') }}', '{{ route('disableLead') }}')"
                                type="button" class="btn btn-success">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="addCSVLeads" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Leads Using CSV/Excel</h5>
                <button id="closeAddLead" style="filter: brightness(0) invert(1);" type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <div class="card-body">

                    <form id="scanCSVForm" enctype="multipart/form-data" method="POST">
                        <div class="accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThreeLight">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThreeLight"
                                        aria-expanded="false" aria-controls="collapseThreeLight">
                                        <h6 class="m-0">System Define Header</h6>
                                    </button>
                                </h2>
                                <div id="collapseThreeLight" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThreeLight" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <small>You can upload a CSV file, and the system will automatically detect the
                                            following headers:
                                        </small>
                                        <ul>
                                            <li>COMPANY</li>
                                            <li>NAME</li>
                                            <li>EMAIL</li>
                                        </ul>
                                        <small>The data is automatically uploaded as leads in the leads list
                                        </small>
                                        <br><br>
                                        <small><i>Alternatively, you can customize the header names according to your
                                                preferences by clicking the 'Use Custom Header Definition'
                                                Button</i></small>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOneLight">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOneLight" aria-expanded="false"
                                        aria-controls="collapseOneLight">
                                        <h6 class="m-0">Use Custom Header Definition</h6>
                                    </button>
                                </h2>
                                <div id="collapseOneLight" class="accordion-collapse collapse"
                                    aria-labelledby="headingOneLight" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">

                                        @csrf
                                        <div class="row mb-3">
                                            <label for="companyNameAdd"
                                                class="col-sm-3 col-form-label">COMPANY</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="companyName" class="form-control"
                                                    placeholder="Match Column of your CSV/Excel"
                                                    id="companyNameCSV" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nameAdd" class="col-sm-3 col-form-label">NAME</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name"
                                                    placeholder="Match Column of your CSV/Excel" class="form-control"
                                                    id="nameAddCSV" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="emailAdd" class="col-sm-3 col-form-label">EMAIL</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email"
                                                    placeholder="Match Column of your CSV/Excel" class="form-control"
                                                    id="emailAddCSV" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-4">
                            <label for="formFile" class="form-label">Upload you CSV/Excel file Here</label>
                            <input class="form-control" type="file" name="leadFile" id="formFile" />
                        </div>
                    </form>
                    <div class="modal-footer flex-column">
                        <button type="button" onclick="Pipeline.ReadCSV('{{ route('readCSV') }}')"
                            class="btn btn-lg btn-primary w-100 mx-0 mb-2">
                            Scan File
                        </button>
                        <button type="button" id="classAddCSV" class="btn btn-lg btn-secondary w-100 mx-0"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="saveCSVdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="text-primary">Scanning Done!</h5>
                <p class="mb-0">
                    We have found <span id="numOfRows"></span> of rows in the file do you want to save them all in your
                    leads list?
                </p>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button" data-bs-toggle="modal" data-bs-target="#savingDataleads"
                    onclick="Pipeline.SaveCSVData('{{ route('addLead') }}', '{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}', '{{ route('getLeadDetails') }}', '{{ route('disableLead') }}')"
                    class="btn text-primary fs-6 col-6 m-0 border-end">
                    <strong>Yes, Please</strong>
                </button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addCSVLeads"
                    class="btn fs-6 col-6 m-0" data-bs-dismiss="modal">
                    No thanks
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="savingDataleads" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="text-primary" id="savingLeadsTitle">Leads are Saving!</h5>

                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Please Wait.....(<span id="savedData"></span>/<span id="totalData"></span>)</span>
                            <span class="text-primary fw-bold"><span id="progressStatus"></span>%</span>
                        </div>
                        <div class="progress small">
                            <div class="progress-bar bg-success" id="progressBar" role="progressbar"
                                style="width: 0%; transition: width 0.3s" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-100 mt-4" style="display: none; justify-content:center; flex-direction: column"
                    id="doneButton">
                    <p class="text-primary">You may now close the progress modal</p>
                    <button data-bs-dismiss="modal" class="btn btn-primary">Done!</button>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="sendMail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Mail</h5>
                <button id="closeAddLead" style="filter: brightness(0) invert(1);" type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="custom-tabs-container">
                        <ul class="nav nav-tabs" id="customTab3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-oneAA" data-bs-toggle="tab" href="#oneAA"
                                    role="tab" aria-controls="oneAA" aria-selected="true"><i
                                        class="icon-email"></i>Send Custom Mail</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-twoAA" data-bs-toggle="tab" href="#twoAA"
                                    role="tab" aria-controls="twoAA" aria-selected="false"><i
                                        class="icon-alternate_email"></i>Mass Mailing</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-threeAA" data-bs-toggle="tab" href="#settingsMail"
                                    role="tab" aria-controls="threeAA" aria-selected="false"><i
                                        class="icon-settings1"></i>Settings</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="customTabContent3">
                            <div class="tab-pane fade show active" id="oneAA" role="tabpanel">
                                <div class="row gx-2">
                                    <div class=" col-12">
                                        <!-- Card start -->
                                        <form method="POST" id="sendCustomMail">
                                            <input type="hidden" name="user_id" value="{{ $user }}">
                                            @csrf
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <div class="m-0">
                                                    <label class="form-label">Recipient</label>
                                                   <select name="recipient" class="form-control" id="">
                                                       <option value="none" selected disabled>---Select Lead Recipient---</option>
                                                       @php
                                                           $leads = App\Models\CshPipeline::where('pl_active',1)->where('user_id', $user)->get();
                                                       @endphp
                                                       @foreach ($leads as $lead)
                                                           <option value="{{ $lead->pl_email }}-{{ $lead->pl_id }}">{{ $lead->pl_email }}</option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                                <div class="m-0">
                                                    <label class="form-label">Subject</label>
                                                    <input type="text" name="subject" class="form-control" placeholder="Subject email" />
                                                </div>
                                                <div class="m-0 mt-4">
                                                    <label class="form-label">Message</label>
                                                    <input type="hidden" name="message" id="inputHiddenMessage">
                                                    <div id="sendCustomMessageBox"></div>
                                                </div>
                                                <div class="d-flex w-100 mt-4 justify-content-end">
                                                   <button type="button" onclick="Pipeline.SendCustomEmail('{{ route('SendCustomMail') }}')" class="fs-5 btn btn-success"><i class="icon-send"></i> Send
                                                   </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <!-- Card end -->
                                    </div>
                                  
                          
                                </div>
                            </div>
                            <div class="tab-pane fade" id="twoAA" role="tabpanel">
                                <h3 class="text-danger">Some Description</h3>
                            </div>
                            <div class="tab-pane fade" id="settingsMail" role="tabpanel">
                                <div class="accordion" id="settingsMailAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="emailTemplateHeading">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#emailTemplates" aria-expanded="false"
                                                aria-controls="emailTemplates">
                                                <h5 class="m-0"><i class="icon-file_copy"></i> Email Templates</h5>
                                            </button>
                                        </h2>
                                        <div id="emailTemplates" class="accordion-collapse collapse"
                                            aria-labelledby="headingSpecialTitleOne"
                                            data-bs-parent="#settingsMailAccordion">
                                            <div class="accordion-body">
                                                <div class="w-100 d-flex justify-content-end">

                                                    <button data-bs-toggle="modal" data-bs-target="#addEmailTemplate" onclick="Support.OpenAdd('tempName', 'emailTemplateEditor', 'updateEmailTempButton', 'saveEmailTempButton')" class="btn btn-success"><i class="icon-plus-circle"></i>
                                                        Add Template</button>
                                                </div>

                                                <ul class="list-group mt-4" id="emailTemplateList">
                                                  

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="emailSignatureTitle">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#emailSignature"
                                                aria-expanded="false" aria-controls="emailSignature">
                                                <h5 class="m-0"><i class="icon-wysiwyg"></i> Email Signature</h5>
                                            </button>
                                        </h2>
                                        <div id="emailSignature" class="accordion-collapse collapse"
                                            aria-labelledby="emailSignature" data-bs-parent="#settingsMailAccordion">
                                            <div class="accordion-body">
                                                <div class="w-100 d-flex justify-content-end">

                                                    <button data-bs-toggle="modal" onclick="Support.OpenAdd('sigName', 'emailSignatureEditor', 'updateEmailSigButton', 'saveEmailSigButton')" data-bs-target="#addEmailSignature" class="btn btn-success"><i class="icon-plus-circle"></i>
                                                        Add Signature</button>
                                                </div>


                                                <ul class="list-group mt-4" id="emailSignatureList">
                                                 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="advanceSettingsTitle">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#advanceSettings"
                                                aria-expanded="false" aria-controls="advanceSettings">
                                                <h5 class="m-0"><i class="icon-sliders"></i> Advance Settings</h5>
                                            </button>
                                        </h2>
                                        <div id="advanceSettings" class="accordion-collapse collapse"
                                            aria-labelledby="advanceSettingsTitle"
                                            data-bs-parent="#settingsMailAccordion">
                                            <div class="accordion-body">
                                                <form method="POST" id="smtpConfig">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user }}">
                                                <h5 class="text-primary">
                                                   Professional Mail Credentials
                                                </h5>
                                                  <div class="ps-4 w-100 mb-4">
                                                    <div class="m-0">
                                                        <label class="form-label">Mail Address</label>
                                                        <input type="text" value="{{ $smtpConfig->econf_username }}" name="mailAddress" id="mailAddress" class="form-control" placeholder="Professional Email Address" />
                                                        <small id="mailAddressE" style="display: none" class="text-danger">This is a required field</small>
                                                    </div>
                                                    <div class="m-0">
                                                        <label class="form-label">Password</label>
                                                        <div class="input-group">
                                                            <input type="password" value="{{ $smtpConfig->econf_password }}" id="mailPassword" name="mailPassword" class="form-control" placeholder="Password" />
                                                            <button class="btn btn-outline-dark" onclick="Support.ShowPass('mailPassword', this)" type="button">
                                                              <i class="icon-eye"></i>
                                                            </button>
                                                        </div>
                                                        <small id="mailPasswordE" style="display: none" class="text-danger">This is a required field</small>
                                                    </div>
                                                  </div>
                                                <h5 class="text-primary">
                                                    SMTP Configuration
                                                 </h5>
                                                 <div class="ps-4 w-100 mb-4">
                                                    <div class="m-0">
                                                        <label class="form-label">SMTP Host</label>
                                                        <input type="text" value="{{ $smtpConfig->econf_host }}" id="smtpHost" name="smtpHost" class="form-control" placeholder="SMTP Host" />
                                                        <small id="smtpHostE" style="display: none" class="text-danger">This is a required field</small>
                                                    </div>
                                                    <div class="m-0">
                                                        <label class="form-label">SMTP Port</label>
                                                        <input type="text" value="{{ $smtpConfig->econf_port }}" name="smtpPort" id="smtpPort" class="form-control" placeholder="SMTP Port" />
                                                        <small id="smtpPortE" style="display: none" class="text-danger">This is a required field</small>
                                                    </div>
                                                    <div class="m-0">
                                                        <label class="form-label">SMTP Encryption</label>
                                                        <input type="text" value="{{ $smtpConfig->econf_encryption }}" id="smtpEncrypt" name="smtpEncrypt" class="form-control" placeholder="SMTP Encryption" />
                                                        <small id="smtpEncryptE" style="display: none" class="text-danger">This is a required field</small>
                                                    </div>
                                                  </div>

                                                  <div class="w-100 d-flex justify-content-end">
                                                    <button type="button" onclick="Pipeline.UpdateSMTPConfig('{{ route('updateSMTPConfig') }}')" class="btn btn-success"><i class="icon-save1"></i> Save</button>
                                                  </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="addEmailTemplate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="updateTemplateHeader" class="modal-title" id="staticBackdropLabel">
                    Add Template
                </h5>
                <button style="filter: brightness(0) invert(1);" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label class="form-label">Template Name</label>
                    <input type="text" id="tempName" class="form-control" placeholder="Template 1" />
                    <small style="display: none" class="text-danger" id="tempNameE">This field is required</small>
                </div>
                	<div class="custom-tabs-container">
											<ul class="nav nav-tabs" id="customTab2" role="tablist">
												<li class="nav-item" role="presentation">
													<a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#addTempEditor" role="tab"
														aria-controls="oneA" aria-selected="true"><i class="icon-edit"></i> Editor
														</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" onclick="Support.OpenOutput('emailTemplateOutput', 'emailTemplateEditor')" id="tab-twoA" data-bs-toggle="tab" href="#addTempOutput" role="tab"
														aria-controls="twoA" aria-selected="false"><i class="icon-type"></i> Output</a>
												</li>
											
											</ul>
											<div class="tab-content" id="customTabContent2">
												<div class="tab-pane fade show active" id="addTempEditor" role="tabpanel">
													<div id="emailTemplateEditor"></div>
												</div>
												<div class="tab-pane fade" id="addTempOutput" role="tabpanel">
												      <div class="card">
                                                        <div class="card-body" id="emailTemplateOutput"></div>
                                                    </div>
												</div>
											
											</div>
										</div>
            </div>
            <div class="modal-footer">
             
                <button type="button" id="closeUpdateTempButton" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#sendMail">
                    Back
                </button>
                <button type="button" onclick="Pipeline.UpdateEmailTempSig('{{ route('UpdateEmailTempSig') }}', 'template', '{{ route('LoadTempSig') }}?user_id={{ $user }}&type=template', '{{ route('DisableEmTempSig') }}')" id="updateEmailTempButton" style="display: none" class="btn btn-primary">
                    <i class="icon-save"></i>   Update Template
                   </button>
                <button type="button" id="saveEmailTempButton" onclick="Pipeline.SaveEmailTemp('{{ route('SaveEmailTemp') }}', 'template', '{{ route('LoadTempSig') }}?user_id={{ $user }}&type=template', '{{ route('DisableEmTempSig') }}')" class="btn btn-primary">
                 <i class="icon-save"></i>   Save
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addEmailSignature" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="updateSignatureHeader" class="modal-title" id="staticBackdropLabel">
                    Add Signature
                </h5>
                <button style="filter: brightness(0) invert(1);" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label class="form-label">Signature Name</label>
                    <input type="text" class="form-control" id="sigName" placeholder="Signature #1" />
                    <small style="display: none" class="text-danger" id="sigNameE">This field is required</small>
                </div>
                	<div class="custom-tabs-container">
											<ul class="nav nav-tabs" id="customTab2" role="tablist">
												<li class="nav-item" role="presentation">
													<a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#addSignEditor" onclick="Support.TabSignature('editor')" role="tab"
														aria-controls="oneA" aria-selected="true"><i class="icon-edit"></i> Editor
														</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" id="tab-twoA" data-bs-toggle="tab" onclick="Support.OpenOutput('emailSignatureOutput', 'emailSignatureEditor')" href="#addSignOutput" role="tab"
														aria-controls="twoA" aria-selected="false"><i class="icon-type"></i> Output</a>
												</li>
											
											</ul>
											<div class="tab-content" id="customTabContent2">
												<div class="tab-pane fade show active" id="addSignEditor" role="tabpanel">
													<div id="emailSignatureEditor"></div>
												</div>
												<div class="tab-pane fade" id="addSignOutput" role="tabpanel">
													<div class="card">
                                                        <div class="card-body" id="emailSignatureOutput"></div>
                                                    </div>
												</div>
												
											</div>
										</div>
            </div>
            <div class="modal-footer">
                <button style="display: none" onclick="Pipeline.SwitchToActiveSig('{{ route('SwitchToActiveSig') }}',  '{{ route('LoadTempSig') }}?user_id={{ $user }}&type=signature', '{{ route('DisableEmTempSig') }}')" id="activeStatusSignature" class="btn btn-outline-success" disabled>Active</button>
                <button id="closeUpdateSigButton" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#sendMail">
                    Close
                </button>
                <button type="button" onclick="Pipeline.UpdateEmailTempSig('{{ route('UpdateEmailTempSig') }}', 'signature', '{{ route('LoadTempSig') }}?user_id={{ $user }}&type=signature', '{{ route('DisableEmTempSig') }}')" id="updateEmailSigButton" style="display: none" class="btn btn-primary">
                    <i class="icon-save"></i>   Update Signature
                </button>
                <button  type="button" id="saveEmailSigButton" onclick="Pipeline.SaveEmailTemp('{{ route('SaveEmailTemp') }}', 'signature', '{{ route('LoadTempSig') }}?user_id={{ $user }}&type=signature', '{{ route('DisableEmTempSig') }}')" class="btn btn-primary">
                    <i class="icon-save"></i>   Save
                </button>
            </div>
        </div>
    </div>
</div>

<form id="emailTempSig" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user }}">
    <input type="hidden" name="name" id="tempSigName">
    <input type="hidden" name="content" id="tempSigContent">
    <input type="hidden" name="type" id="tempSigType">
</form>

<form id="emailTempSigUpdate" method="POST">
    @csrf
    <input type="hidden" name="sigTempId" id="sigTempIdUpdate">
    <input type="hidden" name="name" id="tempSigNameUpdate">
    <input type="hidden" name="content" id="tempSigContentUpdate">
    <input type="hidden" name="type" id="tempSigTypeUpdate">
</form>

<form id="disableEmTempSig" method="POST">
    @csrf
    <input type="hidden" name="id" id="disEmTempSigId">
    <input type="hidden" name="type" id="disEmTempSigType">
</form>

<input type="hidden" value="{{ route('SwitchToActiveSig') }}" id="switchToActiveRoute">

<form id="switchToActiveForm" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user }}">
    <input type="hidden" name="id" id="switchToActiveId">
</form>