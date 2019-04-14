<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\News;

class NewsController extends AbstractController
{

    /**
     * @return Response
     * @throws \Exception
     */
    public function index($slug)
    {
        return $this->render('news.html.twig',[
            'data' => $this->getDoctrine()->getRepository(News::class)->find((int) $slug),
        ]);
    }

}
