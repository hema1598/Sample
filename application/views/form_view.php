<html> 
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo APP_URL; ?>assets/style.css" media="screen"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>assets/script.js" ></script>
</head>  
<body>  
<form id="register_form" method="post" action="/codeigniter/form/savedata" enctype='multipart/form-data'>  
<input type="hidden"  name="registerid" value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->id : ""?>" >  
<div class="container">  
<h1> <?php echo (isset($userdata) && !empty($userdata)) ? "Update" : "Registration"?>  Form</h1>
<hr>  
<label>Firstname</label>  
<input type="text" name="firstname" required size="15" value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->firstname : ""?>"/>   
<label>Lastname:</label>    
<input type="text" name="lastname" size="15" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->lastname : ""?>"/>  

<div>
  <label for="address-line-1">Street Address</label>
  <input type="text" name="street_addres" id="address-line-1" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->street_addres : ""?>">
  
  <label for="address-line-2">Street Address Line 2</label>
  <input type="text" name="street_add" id="address-line-2" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->street_add : ""?>">
    
 <div class="address_align">
  <div class="city-wrap">
    <label for="city">City</label><input type="text" name="city" id="city" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->city : ""?>">
  </div>
   <div class="state-wrap">
    <label for="state">State</label><input type="text" name="state_name" id="state" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->state_name : ""?>">
  </div>
</div>
<div class="zip-wrap">
  <label for="zip">Postal / Zip Code</label>
  <input type="text" name="zip" id="zip" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->zip : ""?>">
</div>
</div>

<div class="d_align">
<label for="dob"><b>Date of Birth:</label>
<input type="date" id="dob" name="dob" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->dob : ""?>">
</div>

<div class="d_align">
<label>Gender :</label>
<input type="radio" name="gender" <?php echo (isset($userdata) && !empty($userdata) && reset($userdata)->gender=="male") ? "checked" : ""?>  value="Male"> Male   
<input type="radio" name="gender" <?php echo (isset($userdata) && !empty($userdata) && reset($userdata)->gender=="female") ? "checked" : ""?> value="Female" > Female  
</div> 

<div class="d_align">
<label class="hobbi">Hobbies :</label>
<input type="checkbox"  name="hobbies[]" <?php echo (isset($userdata) && !empty($userdata) && in_array("Chess",explode('&',reset($userdata)->hobbies)) ) ? "checked" : ""?> value="Chess"><label for="hob1">Playing Chess</label>
<input type="checkbox"  name="hobbies[]" <?php echo (isset($userdata) && !empty($userdata) && in_array("Books",explode('&',reset($userdata)->hobbies))) ? "checked" : ""?> value="Books"><label for="hob2">Reading Books</label>
<input type="checkbox"  name="hobbies[]" <?php echo (isset($userdata) && !empty($userdata) && in_array("Music",explode('&',reset($userdata)->hobbies))) ? "checked" : ""?> value="Music"><label for="hob3">Music</label>
<input type="checkbox"  name="hobbies[]" <?php echo (isset($userdata) && !empty($userdata) && in_array("Cooking",explode('&',reset($userdata)->hobbies))) ? "checked" : ""?> value="Cooking"><label for="hob3">Cooking</label>
</div>

<div class="d_phone">
<label>Phone :</label>
<input type="tel" name="phone" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->phone : ""?>"/> 
</div>

<div> 
<label for="email"><b>Email</label>  
<input type="email" name="email" required value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->email : ""?>"> 
</div>

<div class="d_align" id="image_id">
<label>Choosen a image</label>
<input type="hidden" name="profileimg" id="profileimg" value='<?php echo (isset($userdata) && !empty($userdata)) ? "data:image/jpeg;base64,".base64_encode(reset($userdata)->profilePic) : base_url('assets/images/placeholder-profile.png'); ?>' />
<input type="file" id="myPic" name="profilePic" accept="image/x-png,image/gif,image/jpeg" value="" onchange="readURL(this);"/>
<img id="img_view" width="75px" height="75px" src='<?php echo (isset($userdata) && !empty($userdata)) ? "data:image/jpeg;base64,".base64_encode(reset($userdata)->profilePic) : base_url('assets/images/placeholder-profile.png'); ?>' alt="your image" />
</div>

<div class="d_align" id="pdf_id">
<label>Pdf Attachement</label>
<input type="hidden" name="pdf_at" id="pdf_at" value="<?php echo (isset($userdata) && !empty($userdata)) ? reset($userdata)->pdffile : ""?>" />
<input type="file" id="myFile" name="pdffile" accept="application/pdf" value="">
<label id="img_view" class="pdf_l"><?php echo (isset($userdata) && !empty($userdata)) ? base_url(reset($userdata)->pdffile) : "" ?></label>
</div>

<input type="submit" name="save" class="registerbtn" value="<?php echo (isset($userdata) && !empty($userdata)) ? "Update" : "Submit"?>" />
</form>  
</body>
</html>  