<?php

namespace AppBundle\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\Entity\Article;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ApiManager
{

    protected $requestStack;
    protected $em;


    function __construct(RequestStack $requestStack, EntityManager $em)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;

    }


    /* Article */
    public function getArticles()
    {
        $articles = $this->em->getRepository(Article::class)->findAll();
        $formatted = [];

        if ($articles) {

            foreach ($articles as $article) {

                $formatted[] = [
                    "name" => $article->getName(),
                    "description" => $article->getDescription(),
                    "updateAt" => $article->getUpdateAt(),
                ];
            }
        } else {
            $response = new Response();
            $formatted = [
                "error" => "articles not found",
                "code" => $response::HTTP_NO_CONTENT
            ];
        }

        return new JsonResponse($formatted);
    }

    public function getArticleById($article_id)
    {
        $article = $this->em->getRepository(Article::class)->find($article_id);

        if ($article) {
            $formatted = [
                "name" => $article->getName(),
                "description" => $article->getDescription(),
                "updateAt" => $article->getUpdateAt(),
            ];
        } else {
            $response = new Response();
            $formatted = [
                "article_id" => "" . $article_id,
                "error" => "article not found",
                "code" => $response::HTTP_NO_CONTENT
            ];
        }


        return new JsonResponse($formatted);
    }


    public function getArticleByName($article_name){

        //query builder LIKE on name
        $qb = $this->em->createQueryBuilder();
        $articles = $qb->select('n')->from('AppBundle\Entity\Article', 'n')
            ->where( $qb->expr()->like('n.name', $qb->expr()->literal('%' . $article_name . '%')) )
            ->getQuery()
            ->getResult();

        $formatted = [];

        if ($articles) {

            foreach ($articles as $article) {

                $formatted[] = [
                    "name" => $article->getName(),
                    "description" => $article->getDescription(),
                    "updateAt" => $article->getUpdateAt(),
                ];
            }
        } else {
            $response = new Response();
            $formatted = [
                "error" => "articles not found",
                "code" => $response::HTTP_NO_CONTENT
            ];
        }

        return new JsonResponse($formatted);

    }


    /* Products */
    public function getProducts()
    {
        $products = $this->em->getRepository(Product::class)->findAll();
        $formatted = [];

        if ($products) {

            foreach ($products as $product) {

                $formatted[] = [
                    "name" => $product->getName(),
                    "description" => $product->getDescription(),
                    "updateAt" => $product->getUpdateAt(),
                ];
            }
        } else {
            $response = new Response();
            $formatted = [
                "error" => "product not found",
                "code" => $response::HTTP_NO_CONTENT
            ];
        }

        return new JsonResponse($formatted);
    }

    public function getProductById($product_id)
    {
        $product = $this->em->getRepository(Product::class)->find($product_id);

        if ($product) {
            $formatted = [
                "name" => $product->getName(),
                "description" => $product->getDescription(),
                "updateAt" => $product->getUpdateAt(),
            ];
        } else {
            $response = new Response();
            $formatted = [
                "article_id" => "" . $product_id,
                "error" => "product not found",
                "code" => $response::HTTP_NO_CONTENT
            ];
        }


        return new JsonResponse($formatted);
    }



    public function getProductByName($product_name){

        //query builder LIKE on name
        $qb = $this->em->createQueryBuilder();
        $products = $qb->select('n')->from('AppBundle\Entity\Product', 'n')
            ->where( $qb->expr()->like('n.name', $qb->expr()->literal('%' . $product_name . '%')) )
            ->getQuery()
            ->getResult();

        $formatted = [];

        if ($products) {

            foreach ($products as $product) {

                $formatted[] = [
                    "name" => $product->getName(),
                    "description" => $product->getDescription(),
                    "updateAt" => $product->getUpdateAt(),
                ];
            }
        } else {
            $response = new Response();
            $formatted = [
                "error" => "products not found",
                "code" => $response::HTTP_NO_CONTENT
            ];
        }

        return new JsonResponse($formatted);

    }



    /* test for $request->request->get('post') into Service
    public function checkApi(){
        $request = $this->requestStack->getCurrentRequest();
        return $request->get('article_name');
    }

    */


}
