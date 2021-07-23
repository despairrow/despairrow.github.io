<!-- Use this token to access the HTTP API:
1946333414:AAHD1ZWWcNCBa7Z1ZpG_YphYSn5Ie5cbAjc
Keep your token secure and store it safely, it can be used by anyone to control your bot. -->

<?php

/* Чтобы получить chat id:
1) Запустите бота, командой /start;
2) В общей с ботом группе ввдите команду /join @name_bot, где @name_bot - имя Вашего бота;
3) Введите в адресную строку браузера:
https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее;
4) Откроется страница с данными где нужно найти поле chat id с отрицательнім значением (знаком минуса перед ним) */

//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
if(isset($_POST['user_name']) && !empty($_POST['user_name'])){
     $name = $_POST['user_name'];
} else {
	header( 'Location: error.html', true, 301 );
}
if(isset($_POST['user_phone']) && !empty($_POST['user_phone'])){
     $phone = $_POST['user_phone'];
} else {
	header( 'Location: error.html', true, 301 );
}
if(isset($_POST['user_address']) && !empty($_POST['user_address'])){
     $address = $_POST['user_address'];
} else {
	header( 'Location: error.html', true, 301 );
}
if(isset($_POST['user_message']) && !empty($_POST['user_message'])){
     $message = $_POST['user_message'];
} else {
	header( 'Location: error.html', true, 301 );
}


// $name = $_POST['user_name'];
// $phone = $_POST['user_phone'];
// $address = $_POST['user_address'];
// $message = $_POST['user_message'];

//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1946333414:AAHD1ZWWcNCBa7Z1ZpG_YphYSn5Ie5cbAjc";

//нужна вставить chat id (Как получить chat id, читайте выше)
$chat_id = "-559253938";

if (isset($name) && !empty($name) && isset($phone) && !empty($phone) && isset($address) && !empty($address) && isset($message) && !empty($message)) {

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Имя клиента: ' => $name,
  'Телефон: ' => $phone,
  'Адрес: ' => $address,
  'Описание проблемы: ' => $message
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  //echo "Thank you";
	header( 'Location: sent.html', true, 301 );
} else {
  //echo "Error";
	header( 'Location: error.html', true, 301 );
}
} else {
	header( 'Location: error.html', true, 301 );
}
?>