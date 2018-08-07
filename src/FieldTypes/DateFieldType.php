<?php

namespace Signifly\DefinitionSchema\FieldTypes;

class DateFieldType extends FieldType
{
    protected $id = 'vDate';

    public function epoch($epoch)
    {
        return $this->addProp('epoch', $epoch);
    }
}
