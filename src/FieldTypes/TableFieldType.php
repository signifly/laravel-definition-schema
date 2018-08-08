<?php

namespace Signifly\DefinitionSchema\FieldTypes;

use Closure;
use Signifly\DefinitionSchema\Concerns\HasColumns;

class TableFieldType extends FieldType
{
    use HasColumns;

    protected $id = 'vTable';

    protected function beforeBuild()
    {
        $this->addProp('columns', $this->preparedColumns());
    }
}
