<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// включаемая область для раздела
$APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
    "MODE"      => "php",// будет редактировать в веб-редакторе
    "NAME"      => "Библиотеки для отправки email",// Библиотеки для отправки email
    "TEMPLATE"  => "mail_template.php" // имя шаблона для нового файла
));
?>
    <main>
<?
        //логин, который надо восстановить (написанный пользователем)
        if (!empty($_POST['login'])) {
            $loginRef = $_POST['login'];
        }

        if (!empty($_REQUEST['login'])) {
            $loginRef = $_REQUEST['login'];
        }


        //ID, который надо восстановить (найденный в списке по логину)
        $idRef = "";


        $filter = Array
        (
            "LOGIN" => $loginRef,
        );

        $rsUsers = CUser::GetList(($by = "personal_country"), ($order = "desc"), $filter); // выбираем пользователей
        while ($rsUsers->NavNext(true, "f_")) :
            $idRef = $f_ID;
        endwhile;





    ?>
        <?
        $rsUser = CUser::GetByID($idRef);
        $arUser = $rsUser->Fetch();
        ?>

    <? if ($idRef != "" && $arUser['LOGIN'] == $loginRef):?>

            <section class="scroll-section" id="customContent">

                    <div class="card-body">
                        <div class=" fade show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-body">
                                <?echo "Уважаемый, ".$arUser['NAME']." ".$arUser['LAST_NAME']." подтвердите, что это ваш аккаунт - ".$arUser['LOGIN']." <br>нажимая на кнопку Подтвердить, вы получите на вашу почту новый пароль.<br><br>";?>
                                <div class="mt-2 pt-2 border-top">
                                    <a class="btn btn-primary" href="/user/auth/forgot/form/?agree=yes&login=<?=$loginRef?>">Подтвердить</a>
                                    <a class="btn btn-secondary" href="/user/auth/forgot/">Закрыть</a>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>

    <? else: ?>
        <?header('Location: /user/auth/forgot/?success=2');?>
    <? endif;?>


    <?
    if (isset($_REQUEST['agree'])) {

        $user = new CUser;

        //функция генерирования паролей
        function gen_password($length = 6)
        {
            $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP';
            $size = strlen($chars) - 1;
            $password = '';
            while($length--) {
                $password .= $chars[random_int(0, $size)];
            }
            return $password."a1A";
        }

        $pass = gen_password(8);

        //новый пароль пользователя
        $fields = Array(
            "PASSWORD"          => $pass,
            "CONFIRM_PASSWORD"  => $pass,
        );





        if ($user->Update($idRef, $fields)) {
            //флаг успешной смены пароля
            $flag = true;

            $mail_to = $_REQUEST['login'];


            //уведомление с новым пароем на почту
            $subject = 'Новый пароль TestPersonal';
            $message = 'Здравствуйте, ваш новый пароль - '.$pass;
            sendMail($mail_to, $mail_to, $subject, $message);
            //возврат на страницу с успехом
            header('Location: /user/auth/forgot/?success='.$flag."&login=".$mail_to);
        } else {
            $flag = false;
            $strError .= $user->LAST_ERROR;
            //возврат на страницу с ошибкой
            header('Location: /user/auth/forgot/?success='.$flag."&error=".$strError);
        }
    }








?>
    </main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>