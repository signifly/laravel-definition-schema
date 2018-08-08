<?php

namespace Signifly\DefinitionSchema\FieldTypes;

use Closure;
use Signifly\DefinitionSchema\Concerns\HasColumns;

class SelectMultiSearchTableFieldType extends FieldType
{
    use HasColumns;

    protected $id = 'vSelectMultiSearchTable';

    public function options(array $options)
    {
        return $this->addProp('options', $options);
    }

    public function values($values)
    {
        return $this->addProp('values', $values);
    }

    public function overwrite(array $overwrite)
    {
        return $this->addProp('columnsDataOverwrite', (object) $overwrite);
    }

    protected function beforeBuild()
    {
        $this->addProp('columns', $this->preparedColumns());

        if (! $this->hasProp('columnsDataOverwrite')) {
            $this->overwrite([]);
        }
    }
}
