<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Mensagem;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(SessionInterface $session)
    {
        $frase = $session->get('frase', "Minha boa frase");
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'frase'=>$frase
        ]);
    }

    /**
     * @param SessionInterface $session
     * @Route("/pegar-sessao")
     */
    public function pegarSessao(SessionInterface $session)
    {
        echo $session->get('frase', "luke, im your father");
        exit;
    }

    /**
     * @Route("/escrever-mensagem")
     */
    public function escreverMensagem()
    {
        $mensagem = $this->get("mensagem");
        echo $mensagem->escreverMensagem("Pedro");
        exit;
    }

    /**
     * @Route("/enviar-email")
     * @param \Swift_Mailer $mailer
     */
    public function email(\Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello symfony4'))
            ->setFrom('noreply@gmail.com')
            ->setTo(['envioson@gmail.com'=>"School of net"])
            ->setBody($this->renderView('default/index.html.twig', [
                'controller_name' => "DefaultController",
                'nome' => "aaa"
            ]),'text/html');
        $enviado = $mailer->send($message);

        return new Response("enviado");

    }


}
