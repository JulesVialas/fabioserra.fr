<?php
class Email
{
    public function envoyerMail($nom, $prenom, $sujet, $message)
    {
        $to = 'contact@fabioserra.fr';
        $subject = 'Contact: ' . $sujet;
        $body = "Nom: $nom\nPrénom: $prenom\n\nMessage:\n$message";
        $headers = "From: noreply@fabioserra.fr\r\n";
        $headers .= "Reply-To: noreply@fabioserra.fr\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        return mail($to, $subject, $body, $headers);
    }
}
?>