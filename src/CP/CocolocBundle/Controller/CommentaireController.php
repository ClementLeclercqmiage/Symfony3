<?php

namespace CP\CocolocBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CP\CocolocBundle\Entity\commentaire;
use CP\CocolocBundle\Form\commentaireType;
use CP\CocolocBundle\Entity\Annonce;


/**
*@Route ("auth/{_locale}/Comment")
*/

class CommentaireController extends Controller
{


	/**
	* @Route("/addcomment/{id}",name="addComment")
	* @return Symfony\Component\HttpFoundation\Response
	* @throws \LogicException
	*/
    public function newAction(Annonce $annonce, Request $request)
    {

    	$commentaire = new commentaire();
    	$form = $this->createForm(commentaireType::class, $commentaire,[
    		'action'=>$this->generateUrl('addComment', ['id'=>$annonce->getId()])
    	]);
    $userId= $this->getUser()->getId();
    $userName= $this->getUser()->getUsername();
    $annonceId = $annonce->getId();

    $commentaire->setAuteurId($userId);
    $commentaire->setAuteurName($userName);
    $commentaire->setAnnonceId($annonceId);

    	$form->handleRequest($request);
    	if (!$form->isSubmitted() || ! $form->isValid()){

  			return $this->render('@CPCocoloc/Commentaires/new.html.twig',[
  				'form'=> $form->createView(),
  				'annonce'=>$annonce,

  			]);
  		}
  		$commentaire->setAnnonce($annonce);
  		$em = $this->getDoctrine()->getManager();
  		$em->persist($commentaire);
  		$em->flush();

  		$this->addFlash('notice', 'commentaire posté');

        return $this->redirectToRoute('show',['id'=>$annonce->getId()]);
    }



}




?>