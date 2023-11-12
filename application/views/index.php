<!-- get base url for jQuery -->
<input type="hidden" id="baseUrl" value="<?php echo base_url()?>">

<div class="loaderBox">
    <div class="loaderBoxInr">
        <img src="<?php echo base_url()?>assets/images/loader.gif" class="loaderImg" alt="loader" />
    </div>
</div>

<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?php echo base_url()?>assets/images/signup-min.png" class="img-fluid" alt="Sample image" />
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <!-- signup form #start -->
                <h3 class=" text-danger mb-0">Sign Up</h3>
                <p class="text-muted mb-0">Lorem ipsum is a placeholder text.</p>
                <hr class="mt-0" />
                <form id="signupForm">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control mand" id="name" placeholder="Enter Full Name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email Address:</label>
                        <input type="email" class="form-control mand inp-eml" id="email" placeholder="Enter Email Address" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="text" class="form-control mand" id="pwd" placeholder="Enter Password" name="pwd">
                    </div>
                    <button id="submitBtn" type="button" class="btn btn-primary">Sign Up</button>
                </form> 
                
                <!-- signup form #end -->
            </div>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function(){
    // Get base url
    var root_url= jQuery('#baseUrl').val();
    // alert(root_url);

    jQuery('.loaderBox').hide();


    // email validation function start
    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }
    // email validation function end

    // checking existing email start
    jQuery(".inp-eml").keyup(function(){
        var emailVal = jQuery(this).val();
        var that=jQuery(this);
       
        // alert(emailVal);
        jQuery.ajax({
            url:root_url+"root_folder/root_user_check_exist_email.php",
            type: "POST",
            data: {emailVal:emailVal},
            success: function(data){
                if (data == 1) {

                    if(that.hasClass("req")==false && that.parent().find('.ep-errmsg').length<=0)
                    {
                    that.addClass("req");
                    that.parent().append('<p class="ep-errmsg text-danger">Email Address Already Exists.</p>');
                    // alert(data);
                    }
                }else{
                    that.removeClass("req");
                    that.parent().find('.ep-errmsg').remove();
                }
            }
        });
    });
    // checking existing email end


    // signup operation start
    jQuery('#submitBtn').on("click",function(e){
        e.preventDefault();
        jQuery('.ep-errmsg').remove();
        var flag=1;
        var signupbtn=jQuery(this);

        // Required field check 
        jQuery(this).parent().find(".mand").each(function(){
            var that=jQuery(this);
            if(that.val()==""){
                that.addClass("req");
                that.parent().append('<p class="ep-errmsg text-danger">Please enter a value for this field.</p>');
                flag=0;
            }
        });
        // valid email check using function
        jQuery(this).parent().find(".inp-eml").each(function(){
            var that=jQuery(this);
            var em = that.val();
            if(em!="")
            {
                if(!validateEmail(em)){
                    that.addClass("req");
                    that.parent().append('<p class="ep-errmsg text-danger">Invalid Email ID.</p>');
                    flag=0;
                }
            }else if(em!="" && that.find(".inp-eml")){
            	flag=0;
            }
        });

        if (flag=="1") {
            var name=jQuery("#name").val();
            var email=jQuery("#email").val();
            var pwd=jQuery("#pwd").val();
            // alert(pwd);
            jQuery('.loaderBox').show();
            jQuery.ajax({
                url:root_url+"root_folder/root_user_signup.php",
                type: "POST",
                data: {name:name, email:email, pwd:pwd},
                success: function(data){
                    // alert(data);
                    jQuery('.loaderBox').hide();

                    if(data == 1){
                        //alert(data);
                        jQuery("#signupForm").trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            title: 'User Create Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else if (data == 0){
                        // alert("User Create Faild");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'User Create Faild'
                        });
                    }else{
                        // alert("Invalid Email Address");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Email Address'
                        });
                    }
                    
                }
            });
        }
    });
    // signup operation end
});
</script>
