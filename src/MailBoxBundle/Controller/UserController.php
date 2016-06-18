<?php

namespace MailBoxBundle\Controller;

use MailBoxBundle\Entity\User;
use MailBoxBundle\MailBoxBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/new")
     * @Template
     */
    public function newAction(Request $request)
    {
        $user = new User();

        $form = $this->createFormBuilder($user)->add('name')->add('surname')->add('description')
            ->add('submit', 'submit')->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('mailbox_user_show', array('id' => $user->getId()));
        }

        return ['form' => $form->createView()];
    }


    /**
     * @Route("showAll")
     * @Template()
     */
    public function showAllAction()
    {
        return ['users' => $this->getDoctrine()->getRepository('MailBoxBundle:User')->findAll()];
    }

    /**
     * @Route("/{id}/modify")
     */
    public function editAction($id)
    {

    }

    /**
     * @Route("/{id}/show")
     * @Template()
     */
    public function showAction($id)
    {
        $user = $this->getDoctrine()->getRepository('MailBoxBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException("No User found");
        }

        return ['user' => $user];
    }
}
