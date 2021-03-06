<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css')?>" media="screen" title="no title">
      
  </head>
  <body>
 
    <div class="container login-page">
    <div class="row top200">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Phone Book Application</h3>
                </div>
                <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }elseif($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>
 
                <div class="panel-body">
                   
					<?php 
					$this->load->helper('form');
					$attributes = array('class' => '', 'id' => 'formLogin');
					echo form_open('user/login', $attributes); 
					?>
                        <fieldset>
                            <div class="form-group"  >
                                <input data-validation="email" class="form-control" placeholder="Username" name="user_email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input data-validation="required" class="form-control" placeholder="Password" name="user_password" type="password" value="">
                            </div>
 
 
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login" />
 
                        </fieldset>
                   
                <!--<center><b>Not registered ?</b> <br></b><a href="<?php echo base_url('user'); ?>">Register here</a></center><!--for centered text-->
 
                </div>
            </div>
        </div>
    </div>
</div>
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
 
 <script>
 
 $(function(){
	
	$('#formLogin').validate({
		"rules": {
		  "user_email": {
			 "required": true,
			 "email": true
		  },
		  
		  "user_password": {
			 "required": true
		  }
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
	
 });
 

</script>
 
  </body>
</html>