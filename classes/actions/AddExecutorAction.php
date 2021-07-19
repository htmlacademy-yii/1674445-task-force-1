<?php

namespace myorg\actions;

class AddExecutorAction extends Action
{
    public string $actionName = 'Назначить исполнителя';

    public string $actionHandle = 'action_add_executor';

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
