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

class ArticleController extends Controller
{

    /**
     * @Get("/articles")
     */
    public function getArticlesAction(Request $request, ApiManager $apiManager /* service */)
    {
        $articles_json = $apiManager->getArticles();
        return $articles_json;

    }

    /**
     * @Get("/article/{id}")
     */
    public function getArticleById(Request $request, $id, ApiManager $apiManager /* service */)
    {
        $articles_json = $apiManager->getArticleById($id);
        return $articles_json;


    }

    /**
     * @Get("/article/name/{article_name}")
     */
    public function getArticleByName(Request $request, $article_name, ApiManager $apiManager /* service */)
    {
        $articles_json = $apiManager->getArticleByName($article_name);
        return $articles_json;

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
