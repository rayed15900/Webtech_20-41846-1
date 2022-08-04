<?php 
require_once 'db_connect.php';

function register($data)
{
	$conn = db_conn();
    $selectQuery = "INSERT into registration (name, email, user, pass, gender, dob) VALUES (:name, :email, :user, :pass, :gender, :dob)";
    
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':email' => $data['email'],
        	':user' => $data['user'],
        	':pass' => $data['pass'],
        	':gender' => $data['gender'],
        	':dob' => $data['dob']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showAllUser()
{
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `registration`';

    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showUser($user)
{
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `registration` where user = ?";

    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$user]);
    } 
    catch (PDOException $e) 
    {
        echo $e->getMessage();
    }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function editUserName($user, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE registration set name = ? where user = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $user
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editUserEmail($user, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE registration set email = ? where user = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['email'], $user
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editUserGender($user, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE registration set gender = ? where user = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['gender'], $user
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editUserDOB($user, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE registration set dob = ? where user = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['dob'], $user
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editUserPass($user, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE registration set pass = ? where user = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['pass'], $user
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function restaurant($data)
{
	$conn = db_conn();
    $selectQuery = "INSERT into restaurant (owner, name, email, des, phone) VALUES (:owner, :name, :email, :des, :phone)";
    
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':owner' => $data['owner'],
        	':name' => $data['name'],
        	':email' => $data['email'],
        	':des' => $data['des'],
        	':phone' => $data['phone']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showRestaurant()
{
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `restaurant`';

    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function editRestaurantName($res, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE restaurant set name = ? where owner = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $res
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editRestaurantEmail($res, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE restaurant set email = ? where owner = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['email'], $res
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editRestaurantDes($res, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE restaurant set des = ? where owner = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['des'], $res
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function editRestaurantPhone($res, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE restaurant set phone = ? where owner = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['phone'], $res
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showFoodMenu()
{
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `foodmenu`';

    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function foodItem($data)
{
	$conn = db_conn();
    $selectQuery = "INSERT into foodmenu (owner, name, cat, price) VALUES (:owner, :name, :cat, :price)";
    
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':owner' => $data['owner'],
        	':name' => $data['name'],
        	':cat' => $data['cat'],
        	':price' => $data['price']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteFood($id)
{
	$conn = db_conn();
    $selectQuery = "DELETE FROM `foodmenu` WHERE `ID` = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function searchFood($name)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `foodmenu` WHERE name LIKE '%$name%'";

    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>