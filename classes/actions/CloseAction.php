<?php

namespace myorg\actions;

class CloseAction extends Action
{
    public string $actionName = 'Завершить';

    public string $actionHandle = 'action_close';

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
