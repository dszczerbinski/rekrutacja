<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\RecruitmentService;

class RecruitmentController extends AbstractController
{
    private $recruitment;

    public function __construct(RecruitmentService $recruitment)
    {
        $this->recruitment = $recruitment;
    }

    /**
     * @Route("/")
     */
    public function recruitment(): Response
    {
        if (isset($_POST["strpos"])) {
            $this->recruitment->strpos($_POST['firstString'], $_POST['secondString']);
        }

        //$chucknorrisJoke = $this->recruitment->chucknorris();

        return $this->render('recruitment.html.twig', [
            'chucknorrisJoke' => $chucknorrisJoke = $this->recruitment->chucknorris(),
        ]);
    }
}