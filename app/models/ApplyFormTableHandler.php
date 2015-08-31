<?php

use Yaro\Jarboe\Handlers\CustomHandler;


class ApplyFormTableHandler extends CustomHandler
{

    public function onGetValue($formField, array &$row, &$postfix)
    {
        if ($row) {
            if ($formField->getFieldName() == 'id_catalog') {
                if ($row['id_catalog']) {
                    $product = Tree::find($row['id_catalog']);
                    return '<a href="'. geturl($product->getUrl()) .'" target="_blank">'. $product->title_ru . '</a>';
                }
            }
        }
    } // end onGetValue
}