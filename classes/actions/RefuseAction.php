<?php

namespace myorg\actions;

class RefuseAction extends Action
{
    public string $actionName = 'Отказаться';

    public string $actionHandle = 'action_refuse';

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
            return false;
        }
        if ($currentUserId === $executorId) {
            return true;
        }
    }
}
