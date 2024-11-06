<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php
// Подключаем необходимые стили и скрипты
$this->addExternalCss($templateFolder . "/style.css");
?>


<div class="news-list">
    <h2>Новости</h2>

    <?php if (count($arResult["ITEMS"]) > 0): ?>
        <div class="news-items">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <div class="news-item">
                    <h3 class="news-title">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                    </h3>
                    <div class="news-date">
                        <?= FormatDate("d.m.Y", MakeTimeStamp($arItem["ACTIVE_FROM"])) ?>
                    </div>
                    <div class="news-preview-text">
                        <?= $arItem["PREVIEW_TEXT"] ?>
                    </div>
                    <?php if (!empty($arItem["DETAIL_PICTURE"])): ?>
                        <div class="news-image">
                            <img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
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
    <?php else: ?>
        <p>Новости не найдены.</p>
    <?php endif; ?>
</div>
