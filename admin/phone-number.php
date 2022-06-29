<!DOCTYPE html>
<html lang="en">
 <head>
   <title>International telephone input</title>
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="phone-number.css" />
   <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 </head>
 <body>

<div class="container">
 <form id="login" onsubmit="process(event)" method="POST">
   <p>Enter your phone number:</p>
   <input id="phone" type="tel" name="phone" />
   <input type="submit" class="btn" value="Verify" />
 </form>

<!--  Process the phone number input to get the international format
Add an alert banner below our form. These will help us display our results. -->

<!-- Mettre le pays ici -->


 <div class="alert alert-info" style="display: none;"></div>
</div>

 </body>



 <?php 
if (isset($_POST['select-phone'])) 
{
  $phone2 = $_POST['select-phone'];
  echo $phone2;

}
else{ echo "rien";}
 ?>

 <script>

  /*The plugin defaults to the US, but you're probably implementing this because you have global users. You can update the settings to default to the user's location based on their IP address.

Sign up for a free account at IPinfo and grab your access token. You could use a different IP address API for this if you have a different one you prefer. Add the following function at the top of your <script> tag before defining the phoneInputField object:*/

/*function getIp(callback) {
 fetch('https://ipinfo.io/json?token=26bd6019566692', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}*/

/*  Initialize the intl-tel-input plugin
Add a script tag below the body but inside the HTML and add the following initialization code:
*/

   const phoneInputField = document.querySelector("#phone");

   const phoneInput = window.intlTelInput(phoneInputField, {
    preferredCountries: ['bj', 'ci', 'bf','ml','tg','kw','ma'],
    /*initialCountry: "auto",*/
 /*geoIpLookup: getIp,*/

    utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

   });

/*Next, add a function to handle the form submit. Inside your <script> tag and after the plugin initialization, add the following:*/

   const info = document.querySelector(".alert-info");

function process(event) {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "";
 info.innerHTML = `<input type='text' value = '${phoneNumber}' name = 'select-phone'></input> `;
}


/*The most important part here is phoneInput.getNumber() — this is the plugin code that converts the selected country code and user input into the international format.

Reload the page, enter a phone number and you should see the international format!
*/
/*You can update this setting where you initialize the plugin by adding an array of preferredCountries in ISO 3166-1 alpha-2 code format: https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2*/


/*<strong>${phoneNumber}</strong>*/
 </script>
</html>


<!-- lien: https://www.twilio.com/blog/international-phone-number-input-html-javascript -->




<!-- <script>
   var telInput = $("#mobile"),
   errorMsg = $("#error-msg"),
   validMsg = $("#valid-msg");

   // initialise plugin
   telInput.intlTelInput({

   allowExtensions: true,
   formatOnDisplay: true,
   autoFormat: true,
   autoHideDialCode: true,
   autoPlaceholder: true,
   defaultCountry: "in",
   ipinfoToken: "yolo",

   nationalMode: false,
   numberType: "MOBILE",
   //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
   preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
   preventInvalidNumbers: true,
   separateDialCode: false,
   initialCountry: "in",
   geoIpLookup: function(callback) {
   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
     var countryCode = (resp && resp.country) ? resp.country : "";
     callback(countryCode);
    });
 },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
 });

 var reset = function() {
   telInput.removeClass("error");
   errorMsg.addClass("hide");
   validMsg.addClass("hide");
 };

 // on blur: validate
 telInput.blur(function() {
   reset();
   if ($.trim(telInput.val())) {
     if (telInput.intlTelInput("isValidNumber")) {
       validMsg.removeClass("hide");
     } else {
       telInput.addClass("error");
       errorMsg.removeClass("hide");
     }
   }
 });

 // on keyup / change flag: reset
 telInput.on("keyup change", reset);

</script> -->