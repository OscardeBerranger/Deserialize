<?php

namespace App\Controller;

use App\Entity\Pizza;
use Core\Attributes\Route;
use Core\Controller\Controller;
use Core\Http\Response;
use Core\HttpClient\HttpClient;
use Core\Serializer\Serializer;

class HomeController extends Controller
{
    #[Route(uri: "/", name: "app_home_index", methods: ["GET"])]
    public function index():Response
    {
        $serializer = new Serializer();
        $pizza = [
            "name"=>"cannibale",
            "description"=>"viande",
            "price"=>12
        ];
        $serializer->deserialize(json_encode($pizza), Pizza::class, 'json');
        $response = [
            "m1"=>"test",
        ];

        return $this->json($response);

        //  return $this->render("home/index", [
        //            "pageTitle"=> "Welcome to /home",
        //            "data"=>$response
        //        ]);
    }

    #[Route(uri: "/home/show/{id}", name: "app_home_show", methods: ["GET", "POST"])]
    public function show(int $id):Response
    {
        //echo($id);
        return $this->render("home/index", [
            "pageTitle"=> "Welcome to /home/show"
        ]);
    }

    #[Route(uri: "/home/testQuack", name: "app_home_test", methods: ["GET", "POST"])]
    public function showQuack():Response
    {
        //echo($id);
        return $this->render("home/index", [
            "pageTitle"=> "Welcome to /home/show",
            "name"=>"Jack",
            "fruits"=>["banane","poire","pomme"]
        ]);
    }
}