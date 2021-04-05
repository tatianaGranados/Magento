<?php

namespace Ejemplo\HolaMundo\Api;

interface ItemRepositoryInterface
{
    /**
     * @return \Ejemplo\HolaMundo\Api\Data\ItemInterface[]
     */
    public function getList();
}
