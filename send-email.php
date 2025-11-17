<?php
/**
 * Contact Form Email Handler
 * Sends form submissions to mirkocorona@libero.it
 */

// Set security headers
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Metodo non consentito']);
    exit;
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate required fields
$required_fields = ['name', 'email', 'message'];
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Tutti i campi obbligatori devono essere compilati']);
        exit;
    }
}

// Sanitize inputs
$name = htmlspecialchars(strip_tags(trim($data['name'])));
$email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
$phone = isset($data['phone']) ? htmlspecialchars(strip_tags(trim($data['phone']))) : '';
$service = isset($data['service']) ? htmlspecialchars(strip_tags(trim($data['service']))) : '';
$message = htmlspecialchars(strip_tags(trim($data['message'])));

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Indirizzo email non valido']);
    exit;
}

// Email configuration
$to = 'mirkocorona@libero.it';
$subject = 'Nuovo contatto dal sito web - ' . $name;

// Build email message
$email_message = "Nuovo messaggio dal form di contatto del sito web\n\n";
$email_message .= "Nome: " . $name . "\n";
$email_message .= "Email: " . $email . "\n";
if (!empty($phone)) {
    $email_message .= "Telefono: " . $phone . "\n";
}
if (!empty($service)) {
    $email_message .= "Servizio di interesse: " . $service . "\n";
}
$email_message .= "\nMessaggio:\n" . $message . "\n";

// Email headers
$headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject, $email_message, $headers)) {
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Grazie per averci contattato! Ti risponderemo al più presto.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Si è verificato un errore durante l\'invio del messaggio. Riprova più tardi o contattaci direttamente via email.']);
}
?>
