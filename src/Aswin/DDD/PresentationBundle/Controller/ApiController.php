<?php

namespace Aswin\DDD\PresentationBundle\Controller;

use Aswin\DDD\PresentationBundle\Form\Type\CreateUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @return array
     *
     * @Route("/", name="create_user")
     * @Template
     */
    public function createUserAction(Request $request)
    {
        $form = $this->createForm(new CreateUserType());
        $form->handleRequest($request);
        if ($form->isValid()) {

            $useCase = $this->get('avanti.ipam.create.user');
            $useCase->execute($form->getData());
            return new Response('ok');
        }
        return array(
            'form' => $form->createView(),
        );
    }
}