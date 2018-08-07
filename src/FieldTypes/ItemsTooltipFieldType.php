<?php

namespace Signifly\DefinitionSchema\FieldTypes;

class ItemsTooltipFieldType extends FieldType
{
    protected $id = 'vItemsTooltip';

    public function itemKey($itemKey)
    {
        return $this->addProp('itemKey', $itemKey);
    }

    public function itemLink($itemLink)
    {
        return $this->addProp('itemLink', $itemLink);
    }

    public function items($items)
    {
        return $this->addProp('items', $items);
    }
}
