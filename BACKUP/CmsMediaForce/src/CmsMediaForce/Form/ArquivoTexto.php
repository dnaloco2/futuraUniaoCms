<?php

namespace CmsMediaForce\Form;

use Zend\Form\Form;

class ArquivoTexto  extends Form
{

    public function __construct($name = 'post', array $categorias = null, $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputFilter(new ArquivoTextoFilter());
        $this->setAttribute('method', 'post');
        $this->setAttribute('novalidate', 'true');

        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $nome = new \Zend\Form\Element\Text("descricao");
        $nome->setLabel("Descrição: ")
                ->setAttribute('placeholder','Entre com a descrição do arquivo')
                ->setAttribute('class', 'form-input')
                ->setAttribute('data-ng-model', 'arquivo.descricao')
                ->setRequired(true);

        $this->add($nome);

        $checkbox = new \Zend\Form\Element\Checkbox('expirar');
        $checkbox->setLabel('Não Expirar Arquivo: ')
                    ->setUseHiddenElement(true)
                    ->setCheckedValue("nao")
                    ->setUncheckedValue("sim")
                    ->setAttribute('data-ng-model', 'checked_expirar');

        $this->add($checkbox);
    
        $expirar = new \Zend\Form\Element\Date('expiresAt');
        $expirar
            ->setLabel('Expira Em:')
            ->setAttributes(array(
                'min'  => date("Y-m-d", mktime(0, 0, 0, date("m"),  date("d")+1,  date("Y"))),
                'max'  => date("Y-m-d", mktime(0, 0, 0, date("m"),  date("d"),  date("Y")+1)),
                'step' => '1',
                'data-ng-disabled' => 'checked_expirar',
                'data-ng-model' => 'expiresAt'
            ))
            ->setOptions(array(
                'format' => 'Y-m-d'
            ));
        $this->add($expirar);

        $cats = new \Zend\Form\Element\Select();
        $cats->setLabel("Categoria: ")
                ->setName("categoria")
                ->setOptions(array('value_options' => $categorias));
        $this->add($cats);

        $arquivo = new \Zend\Form\Element\File('arquivo');
        $arquivo->setLabel('Escolha o Arquivo: ')
            ->setAttributes(array(
                'data-valid-file' => '',
                'data-ng-model' => 'upload'
            ));

        $this->add($arquivo);
        
        $csrf = new \Zend\Form\Element\Csrf("security");
        $this->add($csrf);
        
        $this->add(array(
            'name' => 'submit',
            'type'=>'Zend\Form\Element\Submit',
            'attributes' => array(
                'value'=>'Publicar',
                'class' => 'btn-enviar-form button expand',
                'data-ng-hide' => 'corretor.id',
                'data-ng-disabled' => 'formIsInvalid'
            )
        ));
                
       
    }
    
}
