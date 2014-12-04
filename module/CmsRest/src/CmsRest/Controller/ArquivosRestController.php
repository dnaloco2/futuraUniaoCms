<?php 

namespace CmsRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

use Zend\File\Transfer\Adapter\Http as Zend_File_Transfer_Adapter_Http;

class ArquivosRestController extends AbstractRestfulController {

	public function getList()
    {
        $erro = '';

        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");

        $categ_nome = $this->params()->fromRoute('categoria');

        $categ_entity = $em->getRepository('CmsMediaForce\Entity\Categoria')->findOneBy(array( 'nome' => $categ_nome ));

        if ($categ_entity !== null) {
            $categ_id = $categ_entity->getId();

            $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
            $repo = $em->getRepository('CmsMediaForce\Entity\ArquivoTexto');
        
            $data = $repo->findArrayByCategoria( $categ_id );

            return new JsonModel(array( 'categoria' => $categ_id, 'data' => $data ) );
        }

        return new JsonModel(array( 'erro' => '' ) );
        
    }
    
    // Retornar o registro especifico - GET
    public function get($id)
    {
        
        return new JsonModel(array('id'=>$id));
    }
    
    // Insere registro - POST
    public function create($data)
    {

        return new JsonModel(array( 'data' => $data ));
    }
    
    // alteracao - PUT
    public function update($id, $data)
    {
        return new JsonModel(array( 'id' => $id, 'data' => $data ));
    }
    
    // delete - DELETE
    public function delete($id)
    {
        return new JsonModel(array( 'id' => $id ));
    }
}
