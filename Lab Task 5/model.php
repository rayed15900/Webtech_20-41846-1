<?php 

require_once 'db_connect.php';

function showAllFood(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `foodmenu` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showFood($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `foodmenu` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchFood($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `foodmenu` WHERE fname LIKE '%$name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addFood($data){
	$conn = db_conn();
    $selectQuery = "INSERT into foodmenu (fname, cat, price) VALUES (:fname, :cat, :price)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':fname' => $data['fname'],
        	':cat' => $data['cat'],
        	':price' => $data['price']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateFood($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE foodmenu set fname = ?, cat = ?, price = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['fname'], $data['cat'], $data['price'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteFood($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `foodmenu` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}