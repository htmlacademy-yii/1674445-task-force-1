<?php

namespace myorg\actions;

class RespondAction extends Action
{
    public string $actionName = 'Откликнуться';

    public string $actionHandle = 'respond_action';

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
