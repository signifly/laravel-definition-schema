<?php

namespace Signifly\DefinitionSchema\FieldTypes;

class DateTimeFieldType extends FieldType
{
    protected $id = 'vDateTime';

    public function epoch($epoch)
    {
        return $this->addProp('epoch', $epoch);
    }
}
