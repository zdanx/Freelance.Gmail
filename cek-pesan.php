<?php
$bot_token = '7591482505:AAHyKKuLRrva3PzjNsGFrOzX1XsSwqHprm0';
$your_chat_id = '1355136990'; // Chat ID kamu sendiri

// Ambil update terbaru
$updates = file_get_contents("https://api.telegram.org/bot$bot_token/getUpdates");
$updates = json_decode($updates, true);

// Cek pesan terakhir
$last_msg = end($updates['result']);
$text = $last_msg['message']['text'] ?? '';
$from_user = $last_msg['message']['from']['first_name'] ?? 'Seseorang';

// Jangan teruskan kalau kosong
if ($text != '') {
    // Kirim ulang ke kamu
    $pesan = "📩 Pesan dari $from_user:\n\n$text";
    $pesan = urlencode($pesan);
    file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$your_chat_id&text=$pesan");
}
?>
