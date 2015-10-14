@extends('site.layouts.promoters')

<div id="promotersRegistrationRoot" ng-app="promotersRegistrationApp" data-token="<?php echo Session::getToken();?>">

    <div class="container-fluid">

        <!-- views will be injected here -->
        <div ui-view></div>

    </div>

    <script type="text/ng-template" id="form.html">
        <div class="row">
            <div class="form-container">
                <div class="page-header text-center">
                    <div class="container">
                        <h2>User Info</h2>
                    </div>
                </div>
                <div class="row progress_buttons">
                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                        <ul id="progressbar">
                            <li class="active"><a ui-sref-active="active" ui-sref=".company_details">Company<br>Details</a></li>
                            <li><a ui-sref-active="active" ui-sref=".personal_details">Personal<br>Details</a></li>
                            <li><a ui-sref-active="active" ui-sref=".overview">Overview</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row registration-content">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-4">
                        <div class="signup-form">
                            <div class="form-views" ui-view></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/ng-template" id="company.html">
        <form name="companyForm" class="form-horizontal" role="form" novalidate>
            <h4>{{ $company_name }}</h4>
            <div class="form-group" ng-class="{'has-error': companyForm.company_bank_details.$invalid}">
                <label for="company_bank_details" class="col-sm-3 control-label">Bank Details</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="company_bank_details" ng-model="companyData.company_bank_details"  required>
                    <span class="help-block" ng-show="companyForm.company_bank_details.$invalid">*</span>
                </div>
            </div>
            <div class="form-group"  ng-class="{'has-error': companyForm.company_tax_number.$invalid}">
                <label for="company_tax_number" class="col-sm-3 control-label">Tax Number</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="company_tax_number" ng-model="companyData.company_tax_number" required>
                    <span class="help-block" ng-show="companyForm.company_tax_number.$invalid">*</span>
                </div>
            </div>
            <div class="form-group">
                <label for="notes" class="col-sm-3 control-label">Notes</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="notes" ng-model="companyData.notes">
                </div>
            </div>

            <div class="form-group" ng-class="{'has-error': companyForm.country_id.$invalid}">
                <label for="country" class="col-sm-3 control-label">Country</label>
                <div class="col-sm-9">
                    <select class="form-control" name="country" ng-model="addressData.country_id" ng-options="country.id as country.value for country in countries">
                        <option value="">Select Country</option>
                    </select>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error': companyForm.address.$invalid}">
                <label for="address" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" ng-model="addressData.address" required>
                    <span class="help-block" ng-show="companyForm.address.$invalid">*</span>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error': companyForm.post_code.$invalid}">
                <label for="post_code" class="col-sm-3 control-label">Post Code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="post_code" ng-model="addressData.post_code" required>
                    <span class="help-block" ng-show="companyForm.post_code.$invalid">*</span>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error': companyForm.city.$invalid}">
                <label for="city" class="col-sm-3 control-label">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" ng-model="addressData.city" required>
                    <span class="help-block" ng-show="companyForm.city.$invalid">*</span>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error': companyForm.state_province.$invalid}">
                <label for="state_province" class="col-sm-3 control-label">State Province</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="state_province" ng-model="addressData.state_province" required>
                    <span class="help-block" ng-show="companyForm.state_province.$invalid">*</span>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error': companyForm.phone.$invalid}">
                <label for="phone" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" ng-model="addressData.phone" required>
                    <span class="help-block" ng-show="companyForm.phone.$invalid">*</span>
                </div>
            </div>
            <div class="form-group">
                <label for="fax" class="col-sm-3 control-label">Fax</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="fax" ng-model="addressData.fax">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Website</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="website" ng-model="addressData.website">
                </div>
            </div>

            <div class="form-group row registration_buttons">
                <div class="col-xs-5"></div>
                <div class="col-xs-2"></div>
                <div class="col-xs-5">
                    <a ng-click="registrationSubmission('company', 'form.personal_details')" class="btn btn-block form-btn registration_next" ng-disabled="companyForm.$invalid">
                    Next <span></span>
                    </a>
                </div>
            </div>
        </form>
    </script>

    <script type="text/ng-template" id="personal.html">
        <form name="personalForm" class="form-horizontal" role="form" novalidate>
            <h4>{{ $company_name }}</h4>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" ng-model="personalData.email" readonly>
                </div>
            </div>
            <div class="form-group" ng-class="{'has-error': personalForm.personal_phone.$invalid}">
                <label for="personal_phone" class="col-sm-3 control-label">Personal Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="personal_phone" ng-model="personalData.personal_phone" placeholder="Personal Phone" required>
                    <span class="help-block" ng-show="personalForm.personal_phone.$invalid && personalForm.personal_phone.$dirty">*</span>
                </div>
            </div>
            <div class="form-group row registration_buttons">
                <div class="col-xs-5">
                    <a ng-click="goBack('personal', 'form.company_details')" class="btn btn-block form-btn registration_prev">
                    <span></span> Previous
                    </a>
                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-5">
                    <a ng-click="registrationSubmission('personal', 'form.overview')" class="btn btn-block form-btn registration_next" ng-disabled="personalForm.$invalid">
                    Next <span></span>
                    </a>
                </div>
            </div>
        </form>
    </script>

    <script type="text/ng-template" id="overview.html">
        <div class="text-center">
            <h2>Thank you for your input</h2>
            <p>Warning: Please make sure the information you provide is accurate.</p>
            <div class="form-group row registration_buttons">
                <div class="col-xs-5">
                    <a ng-click="goBack('overview', 'form.personal_details')" class="btn btn-block form-btn registration_prev">
                    <span></span> Previous
                    </a>
                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-5">
                    <a href="/my-events" class="btn btn-block form-btn registration_next">Next <span></span></a>
                </div>
            </div><br /><br />
            <p>Press Previous to review your information or next to conclude the registration.</p>
        </div>
    </script>


</div>

