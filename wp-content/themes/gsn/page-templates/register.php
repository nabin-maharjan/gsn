<?php
/**
 * Template Name: Register Page
 *
 * @package GSN
 * @since GSN 1.0
 */
 
 get_header();
 ?>
 
 <div class="container">
  <form>
    <div class="form-group row">
      <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" id="firstName" placeholder="First Name">
      </div>
    </div>
    <div class="form-group row">
      <label for="lastName" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" id="lastName" placeholder="Last Name">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="companyName" class="col-sm-2 col-form-label col-form-label-sm">Company Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" id="companyName" placeholder="Company Name">
      </div>
    </div>
  </form>
</div>
<?php get_footer(); ?>