<?php 

namespace CmsRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

use Zend\File\Transfer\Adapter\Http as Zend_File_Transfer_Adapter_Http;

use CmsBase\Mail\Mail;

class CadastroCorretoresRestController extends AbstractRestfulController {

	public function getList()
    {

        return new JsonModel(array( 'data' => 'getList'));
        
    }
    
    // Retornar o registro especifico - GET
    public function get($email)
    {
        
        return new JsonModel(array('data'=> 'getEmail'));
        
    }
    
    // Insere registro - POST
    public function create($data)
    {   
        $sucesso = false;

        $mail = new Mail($this->getServiceLocator()->get('SONUser\Mail\Transport'), $this->getServiceLocator()->get('View'), 'cadastro-corretor');
        $mail->setSubject('Teste de cadastro')
            ->setTo('arthur@mediaforce.com.br')
            ->setData(array('data' => $data))
            ->prepare()
            ->send();


        return new JsonModel( array( 'success' => $data ) );
    }
    
    // alteracao - PUT
    public function update($id, $data)
    {
        return null;
    }
    
    // delete - DELETE
    public function delete($id)
    {
        return null;
    }
}