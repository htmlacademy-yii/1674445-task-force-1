<?php

declare(strict_types=1);

namespace myorg\general;

use myorg\actions\AddAction;
use myorg\actions\AddExecutorAction;
use myorg\actions\CancelAction;
use myorg\actions\CloseAction;
use myorg\actions\RefuseAction;
use myorg\actions\RespondAction;
use myorg\advanced\BaseException;

class TaskBaseException extends BaseException {}

class Task
{
    public const STATUS_NEW = 'new';
    public const STATUS_CANCEL = 'cancel';
    public const STATUS_IN_PROGRESS = 'inProgress';
    public const STATUS_DONE = 'done';
    public const STATUS_FAILED = 'failed';
    public const STATUS_REFUSED = 'refused';

    public const ACTION_ADD_TASK = 'action_add';
    public const ACTION_RESPOND_TASK = 'action_respond';
    public const ACTION_ADD_TASK_EXECUTOR = 'action_add_executor';
    public const ACTION_REFUSE_TASK = 'action_refuse';
    public const ACTION_CANCEL_TASK = 'action_cancel';
    public const ACTION_CLOSE_TASK = 'action_close';

    public int $customerId;
    public int $developerId;

    public string $status;
    public array $allowedActions;

    public string $publishDate;
    public string $dueDate;
    public object $category;
    public int $budget;
    public object $location;
    public bool $remote;

    public string $title;
    public string $description;
    public array $attachments;
    public string $comments;

    public $responseList;

    public function __construct($customerId)
    {
        $this->customerId = $customerId;
        $this->status = self::STATUS_NEW;
    }

    // метод для возврата «карты» статусов
    public function getStatuses(): array
    {
        return array(
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCEL => 'Отменено',
            self::STATUS_IN_PROGRESS => 'В работе',
            self::STATUS_FAILED => 'Провалено',
            self::STATUS_DONE => 'Выполнено',
            self::STATUS_REFUSED => 'Разработчик отказался',
        );
    }

    // метод для возврата «карты» действий
    public function getActions(): array
    {
        return array(
//            self::ACTION_ADD_TASK => 'Добавить',
//            self::ACTION_RESPOND_TASK => 'Откликнуться',
//            self::ACTION_ADD_TASK_EXECUTOR => 'Назначить исполнителя',
//            self::ACTION_CANCEL_TASK => 'Отменить',
//            self::ACTION_CLOSE_TASK => 'Завершить',
//            self::ACTION_REFUSE_TASK => 'Отказаться',
            new AddAction(),
            new RespondAction(),
            new AddExecutorAction(),
            new CancelAction(),
            new CloseAction(),
            new RefuseAction()
        );
    }

    // метод для получения статуса, в которой он перейдёт после выполнения указанного действия
    public function getNextStatus($actionName): string
    {
        try {
            switch ($actionName) {
                case self::ACTION_ADD_TASK:
                    return self::STATUS_NEW;
                case self::ACTION_ADD_TASK_EXECUTOR:
                    return self::STATUS_IN_PROGRESS;
                case self::ACTION_REFUSE_TASK:
                    return self::STATUS_REFUSED;
                case self::ACTION_CANCEL_TASK:
                    return self::STATUS_CANCEL;
                case self::ACTION_CLOSE_TASK:
                    return self::STATUS_DONE;
                default:
                    throw new TaskBaseException('Action name not founded');
            }
        } catch (TaskBaseException $e) {
            echo 'TaskBaseException: ' . $e->getMessage();
            die();
        }

    }

    // метод для получения доступных действий для указанного статуса
    // вопрос. как тут проверить тип?
    public function getNextActions(string $userRole): object
    {
        try {
            if (!is_string($userRole)) {
                throw new TaskBaseException('Bad type of user role variable');
            }

            if ($this->status == self::STATUS_NEW) {
                if ($userRole == User::ROLE_CUSTOMER) {
                    // return self::ACTION_CANCEL_TASK;
                    return new CancelAction();
                }

                if ($userRole == User::ROLE_DEVELOPER) {
                    return new RespondAction();
                }
            }
            if ($this->status == self::STATUS_IN_PROGRESS) {
                if ($userRole == User::ROLE_CUSTOMER) {
                    // return self::ACTION_CLOSE_TASK;
                    return new CloseAction();
                }

                if ($userRole == User::ROLE_DEVELOPER) {
                    return new RefuseAction();
                }
            }

            if (($userRole != User::ROLE_DEVELOPER) && ($userRole != User::ROLE_CUSTOMER)) {
                throw new TaskBaseException('User role is not founded');
            }
        } catch (TaskBaseException $e) {
            echo 'TaskBaseException: ' . $e->getMessage();
            die();
        }
    }
}
