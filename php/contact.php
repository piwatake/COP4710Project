<?php
require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('hieiforevermine@yahoo.com'); //<<---Put your email address here

//2. For better security, get a random string from this link: http://tinyurl.com/randstr and put it here
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');

$formproc->AddFileUploadField('photo','jpg,jpeg,gif,png,bmp',2024);

if (isset($_POST['submitted']))
{
   if ($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thankyou.php");
   }
}

?>
<?php include("header.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
</head>
<body>

<!-- Form Code Start -->
<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'
enctype="multipart/form-data">
    <h2>Have a picture?</h2>
    <fieldset>
        <legend>Contact Form</legend>
        <h3>Submit your own event photo!</h3>

        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
        <input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

        <div class='short_explanation'>* required fields</div>

        <div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
        <div class='container'>
            <label for='name' >Your Full Name*: </label><br/>
            <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
            <span id='contactus_name_errorloc' class='error'></span>
        </div>
        <div class='container'>
            <label for='email' >Email Address*:</label><br/>
            <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
            <span id='contactus_email_errorloc' class='error'></span>
        </div>
        <div class='container'>
            <label for='message' >Tell us which event and about the picture:</label><br/>
            <span id='contactus_message_errorloc' class='error'></span>
            <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
        </div>
        <div class='container'>
            <label for='photo' >Upload your photo:</label><br/>
            <input type="file" name='photo' id='photo' /><br/>
            <span id='contactus_photo_errorloc' class='error'></span>
        </div>
        <div class='container'>
            <div><img alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
            <label for='scaptcha' >Enter the code above here:</label>
            <input type='text' name='scaptcha' id='scaptcha' maxlength="10" /><br/>
            <span id='contactus_scaptcha_errorloc' class='error'></span>
            <div class='short_explanation'>Can't read the image?
            <a href='javascript: refresh_captcha_img();'>Click here to refresh</a>.</div>
        </div>

        <div class='container'>
            <input type='submit' name='Submit' value='Submit' />
        </div>
    </fieldset>
</form>
<!-- Client-side Form Validations: -->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

    frmvalidator.addValidation("photo","file_extn=jpg;jpeg;gif;png;bmp","Upload images only. Supported file types are: jpg,gif,png,bmp");

    frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");

    document.forms['contactus'].scaptcha.validator
      = new FG_CaptchaValidator(document.forms['contactus'].scaptcha,
                    document.images['scaptcha_img']);

    function SCaptcha_Validate()
    {
        return document.forms['contactus'].scaptcha.validator.validate();
    }

    frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

    function refresh_captcha_img()
    {
        var img = document.images['scaptcha_img'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
    }

// ]]>
</script>

<?php include("footer.php"); ?>