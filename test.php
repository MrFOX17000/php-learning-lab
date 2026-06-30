<?php

require_once 'src/Task.php';
require_once 'src/TaskManager.php';

$taskManager = new TaskManager();
if ($taskManager->getTasks() === []) {
    echo "OK - La liste des tâches est vide" . PHP_EOL;
} else {
    echo "ERREUR - La liste des tâches n'est pas vide" . PHP_EOL;
}
$task1 = $taskManager->createTask("Acheter du lait");
if ($task1->getId() === 1 && $task1->getTitle() === "Acheter du lait" && !$task1->isDone()) {
    echo "OK - La tâche a été créée correctement" . PHP_EOL;
} else {
    echo "ERREUR - La tâche n'a pas été créée correctement" . PHP_EOL;
}
$task2 = $taskManager->createTask("Faire du sport");
if ($task2->getId() === 2 && $task2->getTitle() === "Faire du sport" && !$task2->isDone()) {
    echo "OK - La tâche a été créée correctement" . PHP_EOL;
} else {
    echo "ERREUR - La tâche n'a pas été créée correctement" . PHP_EOL;
}

if (count($taskManager->getTasks()) === 2) {
    echo "OK - La liste des tâches contient 2 tâches" . PHP_EOL;
} else {
    echo "ERREUR - La liste des tâches ne contient pas 2 tâches" . PHP_EOL;
}

if (!$task1->isDone()) {
    echo "OK - La tâche 1 n'est pas terminée" . PHP_EOL;
} else {
    echo "ERREUR - La tâche 1 est terminée" . PHP_EOL;
}
$taskManager->markTaskAsDone(1);
if ($task1->isDone()) {
    echo "OK - La tâche 1 est maintenant terminée" . PHP_EOL;
} else {
    echo "ERREUR - La tâche 1 n'est pas terminée" . PHP_EOL;
}

if (!$task2->isDone()) {
    echo "OK - La tâche 2 n'est pas terminée" . PHP_EOL;
} else {
    echo "ERREUR - La tâche 2 est terminée" . PHP_EOL;
}

try {
    $taskManager->markTaskAsDone(999);
    echo "ERREUR - Aucune exception n'a été lancée" . PHP_EOL;
} catch (OutOfBoundsException $exception) {
    echo "OK - Un identifiant inexistant déclenche une exception" . PHP_EOL;
}

try {
    $task3 = $taskManager->createTask(" ");
    echo "ERREUR - Aucune exception n'a été lancée" . PHP_EOL;
} catch (InvalidArgumentException $exception) {
    echo "OK - Un nom de tâche vide déclenche une exception" . PHP_EOL;
}

$task4 = $taskManager->createTask("Lire un livre");

if ($task4->getId() === 3) {
    echo "OK - L'ID de la nouvelle tâche est correct" . PHP_EOL;
} else {
    echo "ERREUR - L'ID de la nouvelle tâche est incorrect" . PHP_EOL;
}