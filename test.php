<?php
namespace myorg;

require_once __DIR__ . '/vendor/autoload.php';

use myorg\general\User;
use myorg\general\Task;

$sustomer = new User(false);
$task = new Task(1);

var_dump($task->customerId);
var_dump($task->status);
var_dump($task->getStatuses());
var_dump($task->getStatuses());
var_dump($sustomer->role);
var_dump($task->status);
var_dump($task->getNextActions($sustomer));
var_dump($task->getNextStatus('action_cancel'));
