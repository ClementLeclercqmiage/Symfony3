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
use CP\CocolocBundle\Form\AnnonceSearchType;


/**
*@Route ("/{_locale}/home")
*/


class HomeController extends Controller{



		/**
	* @Route ("/show/{id}",requirements ={"id": "\d+"}, name="show")
	*/

	public function showAction(Annonce $annonce){


		return $this->render('@CPCocoloc/Home/show.html.twig',[
			'Annonce'=> $annonce
		]);

	}


		/**
	* @Route("/index", name="index")
	* @return Symfony\Component\HttpFoundation\Response
	* @throws \LogicException
	*/

	public function indexAction(Request $request){
		$repository = $this->getDoctrine()->getRepository(Annonce::class);
		$listAnnonce = $repository->findAll(array('datePublication' => 'desc'));
		$annonce = $this->get('knp_paginator')->paginate($listAnnonce,
		$request->query->get('page',1),8);

		return $this->render('@CPCocoloc/Home/index.html.twig',[
			'Annonce'=> $annonce
		]);
	}


			/**
	* @Route ("/", name="accueil")
	* @return Symfony\Component\HttpFoundation\Response
	*/

	public function homeAction(Request $request){

		return $this->render('@CPCocoloc/Home/Acceuil.html.twig');

	}
}
?>