<!-- Messaging Popup -->
  <div id="popup-messages-container" class="popup-container">
    <div class="popup">
      <h2>Message Thread</h2>
      <button id="popup-messages-close" class="popup-close">X</button>
      <div id="popup-messages-text"></div>
      <form id="popup-messages-form">
          <input type="hidden" id="popup-product-id" name="productId" value="0">
          <input type="hidden" id="popup-buyer-id" name="buyerId" value="0">
          <input type="hidden" id="popup-type" name="type" value="0">
          <input id="popup-message-box" type="text" name="text" required>
          <button class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
  
  <script>
    document.getElementById('popup-messages-close').addEventListener('click',function(){
      document.getElementById('popup-messages-container').classList.remove('active');
    });
    
    var popupText=document.getElementById('popup-messages-text');
    var popupForm=document.getElementById('popup-messages-form');
    popupForm.addEventListener('submit',function(event){
      if(!this.checkValidity()) return;
      
      event.preventDefault();
      
      var data=new FormData(popupForm);
      console.log("Hey!",data);
      
      //Post the message
      fetch('sendmessage.php',{method:'post',body:data,credentials:'include'})
      .then(function(response){
        return response.text();
      }).then(function(text){
        
        //Failure
        if(text=='failure'){
          alert("Sending message failed!");
        //Success
        }else{
          console.log("Text: ",text)
          document.getElementById('popup-messages-text').insertAdjacentHTML('beforeend',text);
          popupForm.reset();
        }
      }).catch(function(response){
        alert("Sending message failed! "+response);
      });
    });
  </script>