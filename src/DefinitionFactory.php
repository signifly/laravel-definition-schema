<?php

namespace Signifly\DefinitionSchema;

use Illuminate\Http\Request;
use Signifly\DefinitionSchema\Exceptions\InvalidDefinitionException;

class DefinitionFactory
{
    /**
     * The difinition type.
     *
     * @var string
     */
    protected $type;

    /**
     * The entity of the definition.
     *
     * @var string
     */
    protected $entity;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new DefinitionFactory instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param string  $type
     * @param string  $entity
     */
    public function __construct(Request $request, string $type, string $entity)
    {
        $this->entity = $entity;
        $this->request = $request;
        $this->type = $type;
    }

    /**
     * Create the definition by a given type and entity.
     *
     * @return \Signifly\DefinitionSchema\Contracts\DefinitionContract
     */
    public function make()
    {
        $namespace = __NAMESPACE__;
        $type = studly_case($this->type);
        $entity = studly_case($this->entity);
        $class = "{$namespace}\\{$type}\\{$entity}{$type}Definition";

        if (! class_exists($class)) {
            throw new InvalidDefinitionException();
        }

        return (new $class($this->request))->setDefaultResourceKey($this->entity);
    }
}
