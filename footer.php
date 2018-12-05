<!-- Footer -->
<footer class="py-2 bg-dark navbar navbar-fixed-bottom" id="footer">
  
      <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; College Bazaar</p>
    
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://market-place-kellywebr.c9users.io/CollegeBazaar/vendor/jquery/jquery.min.js"></script>
<script src="https://market-place-kellywebr.c9users.io/CollegeBazaar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    function showMessages(productId,buyerId=null,type=0){
        fetch('viewmessages.php?productId='+productId+'&buyerId='+buyerId+'&type='+type).then(function(response){
            console.log("GOT TO HERE");
            document.getElementById('popup-messages-container').classList.add('active');
            popupText.innerHTML="<p>Loading...</p>";
            
            document.getElementById('popup-product-id').value=productId;
            document.getElementById('popup-buyer-id').value=buyerId;
            document.getElementById('popup-type').value=type;
            
            return response.text();
        }).then(function(text){
            console.log("Text! ",text);
            
            document.getElementById('popup-messages-text').innerHTML=text;
        }).catch(function(response){
            console.log(response);
        });
    }
    
    // Stick the footer to the bottom of the screen, if the website is large
    function stickyFooter(){
        if(window.innerHeight>document.body.scrollHeight) document.getElementById('footer').style.position='absolute';
        else document.getElementById('footer').style.position='initial';
    }
    
    window.addEventListener('resize',stickyFooter);
    
    stickyFooter();
</script>