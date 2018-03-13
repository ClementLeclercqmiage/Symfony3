<?php

namespace CP\CocolocBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CP\CocolocBundle\Entity\commentaire;
use CP\CocolocBundle\Entity\Annonce;
use CP\CocolocBundle\Form\AnnonceType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use CP\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
*@Route ("/auth/{_locale}")
*/

class AnnonceController extends Controller{


	/**
	* @Route("/user/delete/{id}", requirements={"id":"\d+"},name="deleteAnnonce")
	*/

	public function deleteAction(Annonce $annonce, Request $request){
		$em = $this->getDoctrine()->getManager();
		$em->remove($annonce);
		$em->flush();
		$userManager= $this->get('fos_user.user_manager');
		$user = $userManager->findUsers();

		return $this->redirectToRoute('myAnnonce');
	}


	/**
	* @Route("/user/add", name="addAnnonce")
	* @return Symfony\Component\HttpFoundation\Response
	* @throws \LogicException
	*/

	public function newAction (Request $request){

		$annonce = new Annonce();

		$userId= $this->getUser()->getId();
		$userName= $this->getUser()->getUsername();

		 $form = $this->createForm(AnnonceType::class, $annonce,[
    		'action'=>$this->generateUrl('addAnnonce')
    	]);
		$annonce->setAuteurName($userName);
		$annonce->setAuteurId($userId);
    	$form->handleRequest($request);
    	if (!$form->isSubmitted() || ! $form->isValid()){

  			return $this->render('@CPCocoloc/Annonce/new.html.twig',[
  				'form'=> $form->createView(),
  			]);
  		}

  		$em = $this->getDoctrine()->getManager();
  		$em->persist($annonce);
  		$em->flush();

  		$this->addFlash('notice', 'Annonce postée');

        return $this->redirectToRoute('index');

	}

	/**
	* @Route ("/user/edit/{id}", requirements ={"id": "\d+"}, name= "editAnnonce")
	*/

	public function updateAction(Annonce $annonce, Request $request){
		$form = $this->createForm(AnnonceType::class, $annonce);
		$form->handleRequest($request);
		if (!$form->isSubmitted() || ! $form->isValid()){

  			return $this->render('@CPCocoloc/Annonce/edit.html.twig',[
  				'annonce'=> $annonce,
  				'form'=> $form->createView(),
  			]);
  		}
  		$annonce->setDatepublication(new \Datetime());
  		 $em = $this->getDoctrine()->getManager();
  		$em->flush();
  		$this->addFlash('notice', 'Annonce modfiée');

  		return $this->redirectToRoute('myAnnonce');

	}

		/**
	* @Route("/user/home", name="home")
	* @return Symfony\Component\HttpFoundation\Response
	* @throws \LogicException
	*/

		public function homeAction(Request $request){
		$repository = $this->getDoctrine()->getRepository(Annonce::class);
		$userId= $this->getUser()->getId();
		$annonce = $repository->findBy(
  								array('auteurId' => $userId), 
  								array('datePublication' => 'desc')
  							);

		return $this->render('@CPCocoloc/Annonce/home.html.twig',[
			'Annonce'=> $annonce
		]);
	}

}
?>