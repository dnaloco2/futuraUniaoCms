<?php

namespace CmsMediaForce\Entity;

use Doctrine\ORM\EntityRepository;

class CorretorRepository extends EntityRepository {
	public function findArray()
    {
        $corretores = $this->findAll();
        $a = array();
        foreach($corretores as $corretor)
        {
            $a[$corretor->getId()]['id'] 			= $corretor->getId();
            $a[$corretor->getId()]['nome'] 			= $corretor->getNome();
            $a[$corretor->getId()]['area'] 			= $corretor->getArea();
            $a[$corretor->getId()]['cargo']         = $corretor->getCargo();
            $a[$corretor->getId()]['filial'] 		= $corretor->getFilial();
            $a[$corretor->getId()]['email'] 		= $corretor->getEmail();
            $a[$corretor->getId()]['foto'] 	        = $corretor->getEnderecoFoto();

            $tels = array();

            foreach ($corretor->getTelefones() as $tel) {
                array_push( $tels, $tel->toArray());
            }
            
            $a[$corretor->getId()]['telefones'] = $tels;
        }
        
        return $a;
    }
}
