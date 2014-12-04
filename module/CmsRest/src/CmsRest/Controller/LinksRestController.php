<?php 

namespace CmsRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

use Zend\File\Transfer\Adapter\Http as Zend_File_Transfer_Adapter_Http;

class LinksRestController extends AbstractRestfulController {

	public function getList()
    {

        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repo = $em->getRepository('CmsMediaForce\Entity\Link');
        
        $data = $repo->findArray();

        return new JsonModel(array('data'=>$data));
        
    }
    
    // Retornar o registro especifico - GET
    public function get($id)
    {

        return new JsonModel(array('data'=> ''));
        
    }
    
    // Insere registro - POST
    public function create($data)
    {

        return new JsonModel(array('data'=> ''));
       
    }
            

    // alteracao - PUT
    public function update($id, $data)
    {

        return new JsonModel(array('data'=> ''));
    }
    
    // delete - DELETE
    public function delete($id)
    {
        return new JsonModel(array('data'=> ''));
    }
}