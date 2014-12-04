<?php

namespace CmsMediaForce\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class ConteudoController extends AbstractActionController
{

    public function __construct() 
    {
        $this->entity = "CmsMediaForce\Entity\Posts";
        $this->form = "CmsMediaForce\Form\Posts";
        $this->service = "CmsMediaForce\Service\Posts";
        $this->controller = "users";
        $this->route = "cms-admin/default";
    }

    public function getAction() {
        $categoria = $this->params()->fromRoute('categoria');
        $id = $this->params()->fromRoute('id');

        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");

        $repo = $em->getRepository('CmsMediaForce\Entity\Post');
        
        $data = $repo->find($id)->toArray();

        return new ViewModel( array( 'data' => $data ) );
    }
}
