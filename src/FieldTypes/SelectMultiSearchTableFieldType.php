<?php

namespace Signifly\DefinitionSchema\FieldTypes;

use Closure;

class SelectMultiSearchTableFieldType extends FieldType
{
    protected $id = 'vSelectMultiSearchTable';

    protected $columns = [];

    public function options(array $options)
    {
        return $this->addProp('options', $options);
    }

    public function values($values)
    {
        return $this->addProp('values', $values);
    }

    public function addColumn($name, $label, $field, Closure $callable)
    {
        $fieldType = new $field;
        $callable($fieldType);
        $fieldType = $fieldType->build();
        $column = compact('name', 'label', 'fieldType');
        array_push($this->columns, $column);
        return $this;
    }

    public function overwrite(array $overwrite)
    {
        return $this->addProp('columnsDataOverwrite', (object) $overwrite);
    }

    protected function beforeBuild()
    {
        $this->addProp('columns', $this->columns);
        if (! $this->hasProp('columnsDataOverwrite')) {
            $this->overwrite([]);
        }
    }
}
