<?php

namespace Signifly\DefinitionSchema\FieldTypes;

class InputPasswordFieldType extends FieldType
{
    protected $id = 'vInputPassword';

    public function value($value)
    {
        return $this->addProp('value', $value);
    }
}
