<?php

namespace Signifly\DefinitionSchema\Schema;

use Illuminate\Http\Request;
use Signifly\DefinitionSchema\Contracts\DefinitionContract;

abstract class Definition implements DefinitionContract
{
    use Concerns\HasActions;
    use Concerns\HasModifiers;

    /**
     * The endpoint array.
     *
     * @var array
     */
    protected $endpoint;

    /**
     * The includes for the definition schema.
     *
     * @var array
     */
    protected $includes = [];

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Resource key.
     *
     * @var null|string
     */
    protected $resourceKey = null;

    /**
     * Create a new table definition instance.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Add includes to the definition schema.
     *
     * @param $includes
     */
    public function addIncludes(...$includes)
    {
        $this->includes = $includes;
    }

    /**
     * Set the endpoint for the definition.
     *
     * @param  string $url
     * @param  string $method
     * @return self
     */
    public function endpoint($url, $method = 'get')
    {
        $this->endpoint = compact('url', 'method');

        return $this;
    }

    /**
     * Get the resource key.
     *
     * @return string
     */
    public function getResourceKey()
    {
        return $this->resourceKey;
    }

    /**
     * Determine if there are any includes.
     *
     * @return bool
     */
    public function hasIncludes()
    {
        return count($this->includes) > 0;
    }

    /**
     * Set the default resource key.
     *
     * @param string $resourceKey
     * @return self
     */
    public function setDefaultResourceKey(string $resourceKey)
    {
        if (! $this->resourceKey) {
            $this->resourceKey = $resourceKey;
        }

        return $this;
    }

    abstract protected function schema();
}
