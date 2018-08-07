<?php

namespace Signifly\DefinitionSchema\FieldTypes;

class EditorFieldType extends FieldType
{
    protected $id = 'vEditor';

    public function content($content)
    {
        return $this->addProp('content', $content);
    }
}
