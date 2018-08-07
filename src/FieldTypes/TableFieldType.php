<?php

namespace Signifly\DefinitionSchema\FieldTypes;

use Closure;

class TableFieldType extends FieldType
{
    protected $id = 'vTable';

    protected $columns = [];

    public function addColumn($name, $label, $field, Closure $callable)
    {
        $fieldType = new $field;
        $callable($fieldType);
        $fieldType = $fieldType->build();
        $column = compact('name', 'label', 'fieldType');
        array_push($this->columns, $column);
        return $this;
    }

    protected function beforeBuild()
    {
        $this->addProp('columns', $this->columns);
    }
}
