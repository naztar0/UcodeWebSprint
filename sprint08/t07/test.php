<?php
    require_once("DatabaseConnection.php");
    require_once("Heroes.php");
    require_once("Model.php");

    $model = new Model();
    $model->find(10);
    print_r([$model->name, $model->description, $model->race, $model->class_role]);
    $model->name = 'New Character';
    $model->id = 11;
    $model->save();

    $model->find(10);
    $model->name = 'Changed Character';
    $model->save();
    $model->find(10);
    print_r([$model->name, $model->description, $model->race, $model->class_role]);
?>