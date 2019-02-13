<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Mensagem;
use Symfony\Contracts\Translation\TranslatorInterface;

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

    /**
     * @Route("/logger")
     */
    public function logger(LoggerInterface $logger)
    {
        $logger->info("Somente uma informação");
        $logger->error("Deu erro");
        $logger->critical("Erro crítico", ['motivo'=>"Erro do sistema"]);
        return new Response("Logger executado");


    }

    /**
     * @Route("/filesystem")
     */
    public function filesystem()
    {
        $fs = new Filesystem();
        $dir = $this->getParameter('kernel.project_dir');
        $fs->touch($dir."/fs.txt");
        //$fs->mkdir($dir."/teste",0755);
        //$fs->remove($dir."/teste");

        return new Response("File System");
    }

    /**
     * @Route("/finder")
     */
    public function finder()
    {
        $f = new Finder();
        $dir = $this->getParameter('kernel.project_dir');
        $files = $f->files()->in($dir."/teste2");

        echo "<pre>";
        foreach ($files as $file)
        {
            var_dump();
            echo "<hr>";
        }

        return new Response("Finder");

    }

    /**
     * @Route("/translate/{nome}")
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function translate(TranslatorInterface $translator, $nome)
    {
        //echo $translator->trans("Hello man");
        echo $translator->trans("Hello %name%!", ['%name%'=>$nome]);
        echo "<br>";
        return new Response("Translate");
    }


}
