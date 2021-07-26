<?php
namespace myorg;

require_once __DIR__ . '/vendor/autoload.php';

use myorg\general\User;
use myorg\general\Task;
//use myorg\actions\Action;
use myorg\actions\AddAction;

$sustomer = new User(false);
$task = new Task(1);
//$action = new Action();
$addAction = new AddAction();


//var_dump($task->customerId);
//var_dump($task->status);
//var_dump($task->getStatuses());
//var_dump($task->getStatuses());
//var_dump($sustomer->role);
//var_dump($task->status);

//var_dump($task->getNextActions('customer'));
//var_dump($task->getNextActions('developers'));
//var_dump($task->getNextActions(['developer']));
var_dump($task->getNextActions(false));

//var_dump($task->getNextStatus('action_cancel_me'));

//var_dump($task->getActions());

//var_dump($action);

