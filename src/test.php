<?php

require_once 'src/Task.php';

$task = new Task("Réviser PHP");
echo "Titre de la tâche : " . $task->getTitle() . PHP_EOL;
echo "Tâche terminée : " . ($task->isDone() ? "Oui" : "Non") . PHP_EOL;
$task->setDone();
echo "Tâche terminée : " . ($task->isDone() ? "Oui" : "Non") . PHP_EOL;
$task = new Task(" Réviser PHP ");
echo "Titre de la tâche : " . $task->getTitle() . PHP_EOL;
try {
    $task = new Task("   ");
} catch (InvalidArgumentException $e) {
    echo "Erreur : " . $e->getMessage() . PHP_EOL;
}