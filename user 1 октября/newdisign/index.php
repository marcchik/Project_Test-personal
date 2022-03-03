<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новый дизайн");
?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/snippets/element/2016/datatable/datatablestab.rus.min.css"/>
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/snippets/element/2016/datatable/datatablestab.rus.min.js"></script>

<br /><br />


<div class="container" style="height: 100vh;">
    <div class="col">

        <!-- Меню вкладок -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#example2-tab1" aria-controls="example2-tab1" role="tab" data-toggle="tab">Вкладка №1</a>
            </li>
            <li role="presentation">
                <a href="#example2-tab2" aria-controls="example2-tab2" role="tab" data-toggle="tab">Вкладка №2</a>
            </li>
            <li role="presentation">
                <a href="#example2-tab3" aria-controls="example2-tab3" role="tab" data-toggle="tab">Кандидаты</a>
            </li>
            <li role="presentation">
                <a href="#example2-tab4" aria-controls="example2-tab4" role="tab" data-toggle="tab">Профиль</a>
            </li>
        </ul>

        <!-- Таб панель -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="example2-tab1">
                <table id="example2-tab1-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Возраст</th>
                        <th>Страна</th>
                        <th>Убеждения</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Селподдрев</td>
                        <td>Суходрищев</td>
                        <td>52</td>
                        <td>Россия</td>
                        <td>Нет</td>
                    </tr>
                    <tr>
                        <td>Герпидон</td>
                        <td>Хервбатонов</td>
                        <td>54</td>
                        <td>Россия</td>
                        <td>Пох</td>
                    </tr>
                    <tr>
                        <td>Анастас</td>
                        <td>Выпилвпляс</td>
                        <td>44</td>
                        <td>Россия</td>
                        <td>Бухарь</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="example2-tab2">
                <table id="example2-tab2-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Возраст</th>
                        <th>Страна</th>
                        <th>Убеждения</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Неспиласья</td>
                        <td>Манагина</td>
                        <td>45</td>
                        <td>Россия</td>
                        <td>Сложные</td>
                    </tr>
                    <tr>
                        <td>Нехудея</td>
                        <td>Толстожопова</td>
                        <td>54</td>
                        <td>Россия</td>
                        <td>Веган</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="example2-tab3">
                <div style="margin-top: 40px; margin-bottom: 40px;">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:iblock.element.add",
                        "staff",
                        Array(
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "ALLOW_DELETE" => "Y",
                            "ALLOW_EDIT" => "Y",
                            "COMPONENT_TEMPLATE" => "staff",
                            "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                            "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                            "CUSTOM_TITLE_DETAIL_PICTURE" => "",
                            "CUSTOM_TITLE_DETAIL_TEXT" => "",
                            "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                            "CUSTOM_TITLE_NAME" => "",
                            "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                            "CUSTOM_TITLE_PREVIEW_TEXT" => "",
                            "CUSTOM_TITLE_TAGS" => "",
                            "DEFAULT_INPUT_SIZE" => "30",
                            "DETAIL_TEXT_USE_HTML_EDITOR" => "N",
                            "ELEMENT_ASSOC" => "CREATED_BY",
                            "GROUPS" => array(0=>"2",),
                            "IBLOCK_ID" => "3",
                            "IBLOCK_TYPE" => "employee",
                            "LEVEL_LAST" => "Y",
                            "MAX_FILE_SIZE" => "0",
                            "MAX_LEVELS" => "100000",
                            "MAX_USER_ENTRIES" => "100000",
                            "NAV_ON_PAGE" => "10",
                            "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                            "PROPERTY_CODES" => array(0=>"NAME",),
                            "PROPERTY_CODES_REQUIRED" => array(0=>"NAME",),
                            "RESIZE_IMAGES" => "N",
                            "SEF_MODE" => "N",
                            "STATUS" => "ANY",
                            "STATUS_NEW" => "N",
                            "USER_MESSAGE_ADD" => "",
                            "USER_MESSAGE_EDIT" => "",
                            "USE_CAPTCHA" => "N"
                        )
                    );?>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="example2-tab4">
                <div style="margin-top: 40px;">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.profile",
                        "profile",
                        Array()
                    );?>
                </div>
            </div>

        </div><!-- /.tab-content -->

    </div><!-- /.row -->
</div><!-- /.container -->

<script>
    $(document).ready(function(){
        $('#example2-tab1-dt').DataTable({
            responsive: true
        });
        $('#example2-tab2-dt').DataTable({
            responsive: true
        });
        $('#example2-tab3-dt').DataTable({
            responsive: true
        });
        $('#example2-tab4-dt').DataTable({
            responsive: true
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
        });
    });
</script>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>


