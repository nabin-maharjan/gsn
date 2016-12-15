<?php
/**
 * Template Name: Dashboard
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 ?>
 
 <section>
  <h3>Cateory</h3>
   <div class="container">
   <form name="category_create_form" id="category_create_form">
  <!-- Row start -->
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Email Address">
      </div>
    </div>
    <!-- Row end -->
    
     <!-- Row start -->
    <div class="form-group row">
      <label for="login_password" class="col-sm-2 col-form-label col-form-label-sm">Parent</label>
      <div class="col-sm-10">
        <select class="form-control form-control-sm" name="parent" id="parent">
        	<option value="-1" selected>None</option>
        </select>
      </div>
    </div>
    <!-- Row end -->
    
    <!-- Row start -->
    <div class="form-group row">
      <label for="login_password" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control form-control-sm" name="description" id="description"></textarea>
      </div>
    </div>
    <!-- Row end -->
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
   </div>
 
 </section>
 
 
 
 
 <?php get_footer(); ?>