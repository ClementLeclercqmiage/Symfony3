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
*@Route ("/auth/{_locale}/account")
*/

class UserController extends Controller{


			/**
	* @Route ("/", name="Myaccount")
	* @return Symfony\Component\HttpFoundation\Response
	*/

	public function accountAction(Request $request){

		return $this->render('@CPCocoloc/User/Myaccount.html.twig'
		);

	}


	/**
	* @Route ("/myAnnonce", name="myAnnonce")
	* @return Symfony\Component\HttpFoundation\Response
	*/

	public function myAnnonceAction(Request $request){
		$userId= $this->getUser()->getId();
		$repository = $this->getDoctrine()->getRepository(Annonce::class);
		$listAnnonce = $repository->findBy(
		array('auteurId' => $userId),
		array('datepublication' => 'desc'));

		$annonce = $this->get('knp_paginator')->paginate($listAnnonce,
		$request->query->get('page',1),8);

		return $this->render('@CPCocoloc/User/myAnnonce.html.twig',[
			'Annonce'=> $annonce
		]);
	}



}

?>