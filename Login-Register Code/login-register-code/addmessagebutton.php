<?php
    #$productId;
    #$buyerId;
    #$buttonTitle;
    
    $productId=$_GET['productId'];
?>

console.log("Hey!");

var popupText=document.getElementById('popup-messages-text');

//Create button
var button=document.createElement('button');
button.innerHTML='<?php echo empty($buttonTitle) ? 'Message' : $buttonTitle; ?>';
button.className='message-button';

//Adding the button
document.currentScript.insertAdjacentElement('afterend',button);

button.addEventListener('click',function(){
    showMessages(<?php echo $productId; ?>,<?php echo $buyerId; ?>); #TODO: xxx
});