<?php 

namespace CmsRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use PHPMailer;

use Zend\File\Transfer\Adapter\Http as Zend_File_Transfer_Adapter_Http;

class FormContatoController extends AbstractRestfulController {

	public function getList()
    {

        $mail = new PHPMailer();

        $mail->From = 'teste@yahoo.com.br';
        $mail->FromName = 'Arthur';
        $mail->AddAddress('arthur_scosta@yahoo.com.br');
        $mail->Subject = 'Teste';
        $mail->Body = 'Testando mensagem';

        if(!$mail->send()) {
            echo $mail->ErrorInfo;
        }

        return new JsonModel();
        
    }
    
    // Retornar o registro especifico - GET
    public function get($id)
    {
        
        return new JsonModel();
    }
    
    // Insere registro - POST
    public function create($data)
    {
/*        ob_start();

        var_dump($data);

        $resultado = ob_get_contents();

        ob_end_clean();

        $mail = new PHPMailer();

        $mail->From = 'arthur_scosta@yahoo.com.br';
        $mail->FromName = 'Arthur';
        $mail->AddAddress('something@test.com');
        $mail->Subject = 'Teste';
        $mail->Body = $resultado;

        if(!$mail->send()) {
            return new JsonModel(array('erro', $mail->ErrorInfo));
        }

        return new JsonModel(array('data', $data));
*/


        if (isset($data['inputNome']) && isset($data['inputEmail']) && isset($data['inputAssunto']) && isset($data['inputMensagem'])) {

            //check if any of the inputs are empty
            if (empty($data['inputNome']) || empty($data['inputEmail']) || empty($data['inputAssunto']) || empty($data['inputMensagem'])) {
                $data = array('success' => false, 'message' => 'Por favor, complete o formulário.');
                return new JsonModel($data);
            }

            //create an instance of PHPMailer
            $mail = new PHPMailer();

            $mail->From = $data['inputEmail'];
            $mail->FromName = $data['inputNome'];
            $mail->AddAddress('dnaloco@gmail.com'); //recipient 
            $mail->Subject = $data['inputAssunto'];

            $mensagem = '<style>table tr { padding: 10px; }</style><div style="padding: 20px;"> <br/><br/>' .
                        '<strong>Esta mensagem teve com o origem o formulário de contato do site casesassessoria.com.br</strong>' .
                        '<table>' .
                        '<tbody>'.
                        "<tr>".
                        "<td><strong>Nome:</strong></td>".
                        "<td>{$data['inputNome']}</td>".
                        "</tr>".
                        "<tr>".
                        "<td><strong>Corretora:</strong></td>".
                        "<td>{$data['inputCorretora']}</td>".
                        "</tr>".
                        "<tr>".
                        "<td><strong>Telefone:</strong></td>".
                        "<td>{$data['inputTelefone']}</td>".
                        "</tr>".
                        " <tr>".
                        "<td><strong>Email:</strong></td>".
                        "<td>{$data['inputEmail']}</td>".
                        "</tr>".
                        "<tr>".
                        "<td><strong>Ramo/Produto:</strong></td>".
                        "<td>{$data['inputRamoProd']}</td>".
                        "</tr>".
                        "<tr>".
                        "<td><strong>Assunto:</strong></td>".
                        "<td>{$data['inputAssunto']}</td>".
                        "</tr>".
                        "<tr>".
                        "<td><strong>Mensagem:</strong></td>".
                        "<td>{$data['inputMensagem']}</td>".
                        "</tr>".
                        "</tbody>".
                        "</table>".
                        "</div>";
            $mail->IsHTML(true);
            $mail->Body = $mensagem;

            if (isset($data['ref'])) {
                $mail->Body .= "\r\n\r\nRef: " . $data['ref'];
            }

            if(!$mail->send()) {
                $data = array('success' => false, 'message' => 'A mensagem nã0 pôde ser enviada . Mailer Error: ' . $mail->ErrorInfo);
                return new JsonModel($data);
            }

            $data = array('success' => true, 'message' => 'Obrigado! Nós recebemos a sua mensagem.');
            return new JsonModel($data);

        } else {

            $data = array('success' => false, 'message' => 'Por favor, complete o formulário.');
            return new JsonModel($data);

        }

        return new JsonModel(array( $data ));
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
