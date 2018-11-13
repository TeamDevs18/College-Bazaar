<br>
<br>
<!-- Footer -->
<footer class="py-5 bg-dark navbar navbar-fixed-bottom">
  
      <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; College Bazaar</p>
    
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://market-place-kellywebr.c9users.io/CollegeBazaar/vendor/jquery/jquery.min.js"></script>
<script src="https://market-place-kellywebr.c9users.io/CollegeBazaar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    function showMessages(productId,buyerId=null){
        fetch('viewmessages.php?productId='+productId+'&buyerId='+buyerId).then(function(response){
            document.getElementById('popup-messages-container').classList.add('active');
            popupText.innerHTML="<p>Loading...</p>";
            
            document.getElementById('popup-product-id').value=productId;
            document.getElementById('popup-buyer-id').value=buyerId;
            
            return response.text();
        }).then(function(text){
            console.log("Text! ",text);
            
            document.getElementById('popup-messages-text').innerHTML=text;
        }).catch(function(response){
            console.log(response);
        });
    }
</script>