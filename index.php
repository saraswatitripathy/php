<html>
    <head>
      <title>validation form</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <script type="text/javascript">
        var FormStuff = {
  
        init: function() {
          
          this.applyConditionalRequired();
          this.bindUIActions();
        },
        
        bindUIActions: function() {
          
          $("input[type='radio']").on("change", this.applyConditionalRequired);
        },
        
        applyConditionalRequired: function() {
          
          $(".require-if-active").each(function() {
            var el = $(this);
           
            if ($(el.data("require-pair")).is(":checked")) {
              
              el.prop("require", true);
            } else {
              
              el.prop("require", false);
            }
          });
        }

      };

      FormStuff.init();

     
        </script>

    </head>
    <body>

        <div id="mainform">
            <div class="innerdiv">    
                <form action='#' method='post' id="myForm">
                    <h3>Fill Your Information!</h3>
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type='text' name='username' id='username1' onblur="validate('username', this.value)"></td>
                            <td><div id='username'></div></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type='password' name='password' id='password1' onblur="validate('password', this.value)"></td>
                            <td><div id='password'></div></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type='text' name='email' id='email1' onblur="validate('email', this.value)"></td>
                            <td><div id='email'></div></td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><input type='text' name='phone' id='phone1' maxlength="10" onblur="validate('phone', this.value)"></td>
                            <td><div id='phone'></div></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><input type="radio" name="gender" id="gender1" value="Male"> Male</input>
                             <input type="radio" name="gender" id="gender1" value="Female" > Female</input></td>
                            <td><div id='gender'></div></td>
                        </tr>
                        <tr>
                            <td>Language</td>
                            <td><input type="checkbox" name="box1" id="box1">Hindi</input>
                                <input type="checkbox" name="box2" id="box2">English</input>
                                <input type="checkbox" name="box3" id="box3">Kannada</input>
                                <input type="checkbox" name="box4" id="box4">Oriya</input></td>
                            <td><div id='phone'></div></td>
                        </tr>
           
  <h4>Address</h4>
  <div>
    <div>
      <input type="radio" name="choice-address" id="choice-address-old" required>
      <label for="choice-address-old">Present Address</label>
    
      <div class="reveal-if-active">
        <label for="which-address">Please, fill correct address</label>
        <input type="text" id="which-address" name="which-address" class="require-if-active" data-require-pair="#choice-address-old">
        <label for="which-address">City</label>
        <input type="text" id="which-address" name="which-address" class="require-if-active" data-require-pair="#choice-address-old">
        <label for="which-address">State</label>
        <input type="text" id="which-address" name="which-address" class="require-if-active" data-require-pair="#choice-address-old">
        <label for="which-address">Postal code</label>
        <input type="text" id="which-address" name="which-address" class="require-if-active" data-require-pair="#choice-address-old">
      </div>
    </div>
    
    <div>
      <input type="radio" name="choice-address" id="choice-address-permanent">
      <label for="choice-address-permanent">Parmanent address</label>
    
      <div class="reveal-if-active">
        <label for="which-address">Please, fill correct address</label>
        <input type="text" id="which-address" name="which-address" class="require-if-active" data-require-pair="#choice-address-permanent">
      </div>
    </div>
  </div>
  

                        <tr>
                            <td>website</td>
                            <td><input type='text' name='website' id='website1' onblur="validate('website', this.value)"></td>
                            <td><div id='website'></div></td>
                        </tr>
                    </table>
                    <input type='button' onclick="checkForm()" value='Submit'>
                </form>
            </div>
            
        </div>
    </body>
</html>