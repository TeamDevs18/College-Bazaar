<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title></title>
        <style type="text/css">
            #popupbox{
                margin: 0; 
                margin-left: 40%; 
                margin-right: 40%;
                margin-top: 50px; 
                padding-top: 10px; 
                width: 20%; 
                height: 150px; 
                position: absolute; 
                background: #FBFBF0; 
                border: solid #000000 2px; 
                z-index: 9; 
                font-family: arial; 
                visibility: hidden; 
            }
        </style>
        <script language="JavaScript" type="text/javascript">
            function login(showhide) {
                if (showhide == "show") {
                    document.getElementById('popupbox').style.visibility = "visible";
                } else if (showhide == "hide") {
                    document.getElementById('popupbox').style.visibility = "hidden";
                }
            }
            function isEmpty() {
                var mail = document.signfrm.email.value;
                var pass = document.signfrm.password.value;

                if (mail === "" || pass === "") {
                    alert("Empty Fields");
                    return false;
                }
            }

        </script> 

        <script language="C#"/>

        </script>
    </head>
    <body>

        <div id="popupbox"> 
            <form name="signfrm" action="signupdb.php" method="post">
                <p>Email Address: <input type="text" placeholder="email address" name="email"/></p>
                <p>Password: <input type="password" placeholder="password" name="password"/></p>
                <input type="submit" onclick="return isEmpty()" value="Signup"/>

            </form>
            <br />
            <center><a href="javascript:login('hide');">close</a></center> 
        </div> 

        <p><a href="javascript:login('show');">login</a></p>
    </body>
</html>