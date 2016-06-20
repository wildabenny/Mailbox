<?php

namespace MailBoxBundle\Controller;

use MailBoxBundle\Entity\Address;
use MailBoxBundle\Entity\Email;
use MailBoxBundle\Entity\Telephone;
use MailBoxBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $user = new User();

        $form = $this->createFormBuilder($user)->add('name')->add('surname')->add('description')->add('groups', 'entity', array(
            'class' => 'MailBoxBundle:Groups',
            'property' => 'name',
            'multiple' => true,
        ))
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
     * @Template()
     */
    public function editAction($id, Request $request)
    {
        $user = $this->getDoctrine()->getRepository('MailBoxBundle:User')->find($id);

        if (!$user) {
            return $this->createNotFoundException("No user found");
        }

        $form = $this->createFormBuilder($user)->add('name')->add('surname')->add('description')->add('groups', 'entity', array(
            'class' => 'MailBoxBundle:Groups',
            'property' => 'name',
            'multiple' => true,
        ))
            ->add('submit', 'submit')->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('mailbox_user_show', array('id' => $user->getId()));
        }

        return ['form' => $form->createView()];
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

    /**
     * @Route("/editAddress/{id}")
     * @Template()
     */
    public function editAddressAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository('MailBoxBundle:User')->find($id);

        $address = new Address();
        $address->setUser($user);

        $form = $this->createFormBuilder($address)->add('city')->add('street')->add('houseNumber')
            ->add('apartamentNumber')->add('submit', 'submit')->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirectToRoute('mailbox_user_show', array('id' => $user->getId()));
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editPhone/{id}")
     * @Template()
     */
    public function editPhoneAction($id, Request $request)
    {
        $user = $this->getDoctrine()->getRepository('MailBoxBundle:User')->find($id);
        $phone = new Telephone();
        $phone->setUser($user);

        $form = $this->createFormBuilder($phone)->add('type')->add('telNumber')->add('submit', 'submit')->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($phone);
            $em->flush();

            return $this->redirectToRoute('mailbox_user_show', ['id' => $user->getId()]);
        }
        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editEmail/{id}")
     * @Template()
     */
    public function editEmailAction($id, Request $request)
    {
        $user = $this->getDoctrine()->getRepository('MailBoxBundle:User')->find($id);
        $email = new Email();
        $email->setUser($user);

        $form = $this->createFormBuilder($email)->add('emailType')->add('emailAddress')
            ->add('submit', 'submit')->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($email);
            $em->flush();

            return $this->redirectToRoute('mailbox_user_show', ['id' => $user->getId()]);
        }
        return ['form' => $form->createView()];
    }

}
