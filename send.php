<?php
$bot_token = "7591482505:AAHyKKuLRrva3PzjNsGFrOzX1XsSwqHprm0";
$chat_id = "1355136990";

$text = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';

if (empty($text)) {
    echo "Pesan tidak boleh kosong!";
    exit;
}

$url = "https://api.telegram.org/bot$bot_token/sendMessage";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'chat_id' => $chat_id,
    'text' => $text
));

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 200) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Gagal mengirim pesan. Respon: " . $response;
}
?>
