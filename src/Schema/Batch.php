<?php

namespace Signifly\DefinitionSchema\Schema;

use Signifly\DefinitionSchema\Action;
use Illuminate\Contracts\Support\Arrayable;

class Batch implements Arrayable
{
    use Concerns\Buildable;
    use Concerns\HasActions;

    protected $sequential = false;

    protected $selectedOptions;

    /**
     * Add sequential editing.
     *
     * @return void
     */
    public function sequential()
    {
        return $this->sequential = true;
    }

    /**
     * Add selected options.
     *
     * @param  string $label
     * @param  string $link
     * @return self
     */
    public function selectedOptions($label, $link)
    {
        $this->selectedOptions = compact('label', 'link');

        return $this;
    }

    /**
     * Convert to array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'sequential' => $this->sequential,
            'bulk' => $this->hasActions(),
            'actions' => $this->preparedActions(),
            'selectedOptions' => $this->selectedOptions ?: (object) [],
        ];
    }
}
