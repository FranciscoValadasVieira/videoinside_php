<?php 
include __DIR__ . './includes/header_main.php';
?>

<div id="contact_wrap">
    <img id="headphones" src="pics/headphones2.jpg" alt="">
    
    
    <div id="contact_text">
        <h3>Une idée ? Un projet ?</h3>
        <h4>Nous sommes à votre écoute</h4>
        <div id="tel">
            <h5>Contactez-nous au 01 80 87 81 27</h5>
            <p>Vous pouvez aussi nous <a href="#contact_form">envoyer un message<a></p>
        </div>
    </div>
</div>
    
<form id="contact_form" action="">
        <input id="nom_contact" name="nom_contact" type="text" placeholder="Nom*">
        <input id="email_contact" name="email_contact" type="mail" placeholder="E-mail*">
        <input id="message_contact" name="message_contact" type="text" placeholder="Message*">
        <input type="submit" id="btn_contact">
</form>    


<?php include __DIR__ . './includes/footer.php';?>
