<?php

namespace MailBoxBundle\Controller;

use MailBoxBundle\Entity\Groups;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/groups")
 */
class GroupsController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{

    /**
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/new")
     * @Template()
     */
    public function addGroupAction(Request $request)
    {
        $group = new Groups();

        $form = $this->createFormBuilder($group)->add('name')->add('submit', 'submit')->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirectToRoute('mailbox_user_showall');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/all")
     * @Template()
     */
    public function allGroupsAction()
    {
        $groups = $this->getDoctrine()->getRepository('MailBoxBundle:Groups')->findAll();
        if (!$groups) {
            return $this->createNotFoundException("Not found any group");
        }
        return ['groups' => $groups];
    }

    /**
     * @Route("/groupMembers/{id}")
     * @Template()
     */
    public function groupMembersAction($id)
    {
        $group = $this->getDoctrine()->getRepository('MailBoxBundle:Groups')->find($id);
        if (!$group) {
            return $this->createNotFoundException("Group not found");
        }
        return ['group' => $group];
    }


}
