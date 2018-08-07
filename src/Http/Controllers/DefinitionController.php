<?php

namespace Signifly\DefinitionSchema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Signifly\DefinitionSchema\DefinitionFactory;

class DefinitionController extends Controller
{
    public function show(Request $request, $type, $entity)
    {
        $definition = (new DefinitionFactory($request, $type, $entity))->make();

        return new JsonResponse($definition->build());
    }
}
