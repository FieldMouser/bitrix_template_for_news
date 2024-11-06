<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php $this->addExternalCss($templateFolder . "/tasks-for-trainees/build/css/common.css"); ?>

<div id="barba-wrapper">
    <div class="article-list">
        <?php if (count($arResult["ITEMS"]) > 0): ?>
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <a class="article-item article-list__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" data-anim="anim-3">
                    <div class="article-item__background">
                        <?php
                            // Проверяем поле DETAIL_PICTURE или PREVIEW_PICTURE для изображения
                            $imagePath = '';
                            
                            // Если есть DETAIL_PICTURE (картинка для детали новости)
                            if (!empty($arItem["DETAIL_PICTURE"])) {
                                $imagePath = CFile::GetPath($arItem["DETAIL_PICTURE"]);
                            }
                            // Если нет DETAIL_PICTURE, проверяем PREVIEW_PICTURE
                            elseif (!empty($arItem["PREVIEW_PICTURE"])) {
                                $imagePath = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
                            }
                            
                            // Если изображения есть, выводим его
                            if ($imagePath) {
                                echo '<div class="news-image"><img src="' . $imagePath . '" alt="' . htmlspecialchars($arItem["NAME"]) . '"></div>';
                            } else {
                                // Если нет изображения, показываем картинку по умолчанию
                                echo '<div class="news-image"><img src="' . $templateFolder . '/build/images/default-image.jpg" alt="Нет изображения"></div>';
                            }
                        ?>
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
