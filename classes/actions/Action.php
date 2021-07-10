<?php

namespace myorg\actions;

abstract class Action
{
    protected string $actionName;

    protected string $actionHandle;

    abstract protected function getName();

    abstract protected function getHandle();

    abstract protected function checkRights($currentUserId, $customerId, $executorId);
}


