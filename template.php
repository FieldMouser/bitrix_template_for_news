<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php $this->addExternalCss($templateFolder . "/tasks-for-trainees/build/css/common.css"); ?>
<link rel="shortcut icon" href="<?= $templateFolder ?>/build/images/favicon.604825ed.ico" type="image/x-icon">

<div id="barba-wrapper">
    <div class="article-list">
        <?php if (count($arResult["ITEMS"]) > 0): ?>
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <a class="article-item article-list__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" data-anim="anim-3">
                    <div class="article-item__background">
                        <?php if (!empty($arItem["DETAIL_PICTURE"])): ?>
                            <img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
                        <?php else: ?>
                            <img src="<?= $templateFolder ?>/build/images/default-image.jpg" alt="Нет изображения">
                        <?php endif; ?>
                    </div>
                    <div class="article-item__wrapper">
                        <div class="article-item__title"><?= $arItem["NAME"] ?></div>
                        <div class="article-item__content"><?= $arItem["PREVIEW_TEXT"] ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Новости не найдены.</p>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:system.pagenavigation",
            "",
            array(
                "NAV_OBJECT" => $arResult["NAV_RESULT"],
                "SEF_MODE" => "N"
            )
        );
        ?>
    </div>
</div>
