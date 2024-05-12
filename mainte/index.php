<?php

require 'db_connection.php';

// $sql = 'select * from contacts where id = 3';

// $stmt = $pdo->query($sql);

// $result = $stmt->fetchAll();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

$sql = 'select * from contacts where id = :id';//名前付きプレースホルダ

$result = $stmt->fetchAll();

echo '<pre>';
var_dump($result);
echo '</pre>';

$pdo->beginTransaction();

try{

  // sql処理
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue('id', 2, PDO::PARAM_INT);
  $stmt->execute();

  $pdo->commit();
} catch (PDOException $e) {
  $pdo->rollBack();
}