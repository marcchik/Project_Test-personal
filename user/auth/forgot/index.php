

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница восстановления пароля");
?>

    <main>
        <h2>Восстановление пароля</h2>
        <section class="scroll-section" id="wrapping">
            <div class="card mb-5">
                <div class="card-body">
                    <form method="post" action="/user/auth/forgot/form/">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">E-mail</span>
                            <input type="text" class="form-control" name="login"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Введите логин" aria-label="Username" aria-describedby="addon-wrapping">
                            <input class="btn btn-outline-primary" name ="send" type="submit" value="Выслать новый пароль"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>



        <?
        if (!empty($_REQUEST)) {
            if($_REQUEST['success'] == 1) {
                echo '<div class="alert alert-primary" role="alert">Пароль успешно изменен!</div>';
            } elseif ($_REQUEST['success'] == 2) {
                echo '<div class="alert alert-danger" role="alert">Пользователь не был найден!!!</div>';
            } else
                echo '<div class="alert alert-danger" role="alert">'.$_REQUEST['error'].'</div>';
        }
        ?>
    </main>






<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>