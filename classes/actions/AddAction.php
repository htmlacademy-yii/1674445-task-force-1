<?php

namespace myorg\actions;

class AddAction extends Action
{
    public string $actionName = 'Добавить';

    public string $actionHandle = 'add_task';

    public function getName()
    {
        return $this->actionName;
    }

    public function getHandle()
    {
        return $this->actionHandle;
    }

    public function checkRights($currentUserId, $customerId, $executorId)
    {
        if ($currentUserId === $customerId) {
            return true;
        }
        if ($currentUserId === $executorId) {
            return false;
        }
    }
}
