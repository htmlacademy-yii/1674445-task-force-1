<?php php

class Task
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELED = 'cancel';
    const STATUS_IN_PROGRESS = 'in progress';
    const STATUS_DONE = 'done';
    const STATUS_FAILED = 'failed';

    const ACTION_START_TASK = 'start task';
    const ACTION_ADD_TASK_DEVELEPER = 'add task developer';
    const ACTION_CLOSE_TASK = 'close task';
    const ACTION_REFUSE_TASK = 'refuse task';
    const ACTION_CANCEL_TASK = 'cancel task';

    public $customerId;
    public $developerId;

    public $currentStatus;

    public function __construct($customerId, $developerId)
    {
        $this->customerId = $customerId;
        $this->developerId = $developerId;
    }

    // метод для возврата «карты» статусов
    public function getStatuses()
    {}

    // метод для возврата «карты» действий
    public function getActionses()
    {}

    // метод для получения статуса, в которой он перейдёт после выполнения указанного действия
    public function setStatus()
    {}

    // метод для получения доступных действий для указанного статуса
    public function setActions()
    {}
}
