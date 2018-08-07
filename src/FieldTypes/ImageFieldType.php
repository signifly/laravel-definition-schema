<?php

namespace Signifly\DefinitionSchema\FieldTypes;

class ImageFieldType extends FieldType
{
    protected $id = 'vImage';

    public function image($image)
    {
        return $this->addProp('image', $image);
    }
}
