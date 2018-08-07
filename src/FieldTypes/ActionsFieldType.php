<?php

namespace Signifly\DefinitionSchema\FieldTypes;

use Closure;
use Signifly\DefinitionSchema\Action;

class ActionsFieldType extends FieldType
{
    protected $id = 'vActions';

    protected $actions = [];

    public function addItem($title, Closure $callable)
    {
        $action = new Action($title);

        $callable($action);

        $action = $action->toArray();

        $this->actions[] = $action;

        return $this;
    }

    protected function beforeBuild()
    {
        $this->addProp('actions', $this->actions);
    }
}
