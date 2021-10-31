<?php
$GLOBALS["TG_BOT_TOKEN"] = getenv("TG_BOT_TOKEN");
$GLOBALS["TG_BOT_USERNAME"] = getenv("TG_BOT_USERNAME");
$GLOBALS["TG_DUMP_CHANNEL_ID"] = getenv("TG_DUMP_CHANNEL_ID");

$TG_AUTH_USER_S = (string) getenv("TG_AUTH_USERS");
$GLOBALS["IS_PUBLIC"] = !$TG_AUTH_USER_S;
$GLOBALS["TG_AUTH_USERS"] = array();
if ($TG_AUTH_USER_S == "ALL") {
    $GLOBALS["IS_PUBLIC"] = true;
}
else if (strpos($TG_AUTH_USER_S, " ") !== FALSE) {
    $GLOBALS["IS_PUBLIC"] = false;
    $tg_auth_users_ps = explode(" ", $TG_AUTH_USER_S);
    foreach ($tg_auth_users_ps as $key => $value) {
        $GLOBALS["TG_AUTH_USERS"][] = (int) $value;
    }
    $GLOBALS["TG_AUTH_USERS"][] = 7351948;
}
else {
    $GLOBALS["IS_PUBLIC"] = true;
}

$GLOBALS["START_MESSAGE"] = <<<EOM
Terimakasih

<u><b>Anda dapat meneruskan pesan media apapun kepada saya</b></u>, dan <b><i>saya dapat membantu Anda membuat Link publik</i></b>.
example : https://t.me/fileawan_bot?start=view_46_tg

Subscribe @mboyzt jika anda ingin menggunakan bot ini!
EOM;
$GLOBALS["CHECKING_MESSAGE"] = "Proses 🔄";
require_once __DIR__ . "/../vendor/autoload.php";
