<?php

namespace myorg\actions;

class CancelAction extends Action
{
    public string $actionName = 'Отменить';

    public string $actionHandle = 'action_cancel';

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
