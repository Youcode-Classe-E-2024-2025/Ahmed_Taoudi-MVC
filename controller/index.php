<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ajoute_submit'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $description = htmlspecialchars($_POST['description']);
        $db->query(
            "insert into product(nom,prix,description) values (:nom ,:prix , :description)",
            ['nom' => $nom, 'prix' => $prix, 'description' => $description]
        );
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $db->query("delete from product where id =:id", ['id' => $id]);
    }
}


/*
create database mvc_test ; use mvc_test ;

create table product(
        id int primary key auto_increment ,
        nom varchar(255) not null ,
        prix decimal(10,2) not null ,
        description text not null
        
);
*/

// $products = [
//     [
//         'nom' => "aaa",
//         'prix' => 222,
//         'description' => "aaa nadi nadi "

//     ],
//     [
//         'nom' => "bbb",
//         'prix' => 34,
//         'description' => "bbb nadi nadi "

//     ],
//     [
//         'nom' => "ccc",
//         'prix' => 12,
//         'description' => "ccc nadi nadi "

//     ],
// ];
$products = $db->query("select * from product")->fetchAll();
require("view/index.view.php");
