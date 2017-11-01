<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;


use AppBundle\Service\ApiManager;

class ProductController extends Controller
{

    /**
     * @Get("/products")
     */
    public function getProductsAction(Request $request, ApiManager $apiManager /* service */)
    {
        $products_json = $apiManager->getProducts();
        return $products_json;

    }

    /**
     * @Get("/product/{id}")
     */
    public function getArticleById(Request $request, $id, ApiManager $apiManager /* service */)
    {
        $products_json = $apiManager->getProductById($id);
        return $products_json;


    }

    /**
     * @Get("/product/name/{product_name}")
     */
    public function getArticleByName(Request $request, $product_name, ApiManager $apiManager /* service */)
    {
        $products_json = $apiManager->getProductByName($product_name);
        return $products_json;

    }

    /*

    /**
     * @Post("/article/add")
    public function postArticle(Request $request, ApiManager $apiManager)
    {
        //get repo and get all articles
        //try with postman a request post and var ump request
        //x-form- ... sur potsman et mettr en body param user en key et une val (dans notre cas articel)

        //creer un service qui check en fonction de la requete les param pour eviter de repeter
        $myRequest = $request;
        $check_test = $apiManager->checkApi($myRequest);

        return new JsonResponse($check_test);

    }

    */


}
