<script>
    <?php
        #$productId;
    ?>
    
    var popupThreads=document.getElementById('popup-buyers-threads');

    //Create button
    var button=document.createElement('button');
    button.innerHTML='Messages';
    button.className='message-button btn btn-primary';
    
    //Adding the button
    document.currentScript.insertAdjacentElement('afterend',button);
    
    button.addEventListener('click',function(){
        fetch('viewproductmessages.php?productId=<?php echo $productId; ?>').then(function(response){
            document.getElementById('popup-buyers-container').classList.add('active');
            popupThreads.innerHTML="<p>Loading...</p>";
            
            return response.text();
        }).then(function(text){
            console.log("Text! ",text);
            
            popupThreads.innerHTML=text;
        }).catch(function(response){
            console.log(response);
        });
    });
</script>