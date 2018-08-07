<?php

namespace Signifly\DefinitionSchema\FieldTypes;

use Closure;

class ModalFieldType extends FieldType
{
    protected $id = 'vButtonAction';

    protected $data;

    protected $endpoint;

    protected $fields = [];

    protected $onSubmit;

    protected $title;

    public function addField($name, $label, $field, Closure $callable)
    {
        $fieldType = new $field;
        $callable($fieldType);
        $fieldType = $fieldType->build();
        $field = compact('name', 'label', 'fieldType');
        array_push($this->fields, $field);
        return $this;
    }

    public function button($text, $icon = 'plus', $type = 'primary')
    {
        $this->addProp('title', $text);
        $this->addProp('icon', $icon);
        return $this->addProp('type', $type);
    }

    public function fieldsData(array $data)
    {
        $this->data = (object) $data;

        return $this;
    }

    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    public function endpoint($url, $method = 'post')
    {
        $this->endpoint = compact('method', 'url');

        return $this;
    }

    public function onSubmit($onSubmit)
    {
        $this->onSubmit = $onSubmit;

        return $this;
    }

    protected function beforeBuild()
    {
        $this->addProp('action', [
            'id' => 'modal',
            'endpoint' => $this->endpoint,
            'title' => $this->title ?? $this->props['title'],
            'fields' => $this->fields,
            'data' => $this->data,
        ]);
    }
}
