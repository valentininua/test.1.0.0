<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\News;

class IndexController extends AbstractController
{
    /**
     * @return Response
     * @throws \Exception
     */
    public function index()
    {
        return $this->render('index.html.twig',[
            'data' => $this->getDoctrine()->getRepository(News::class)->findAll(),
        ]);
    }
}
