<?php

namespace CmsMediaForce\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use CmsMediaForce\Entity\Corretor;
use CmsMediaForce\Entity\Telefone;

/*
class LoadCorretor extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        

        $arrayCorretores = [];

        for ($i = 0; $i < 30; $i++) {

            $tel = null;
            if ($i % 2 == 0) {
                $celular = new Telefone;
                $celular->setNumero('99999-999' . $i)
                ->setTipo('celular');

                $tel = $celular;

                $manager->persist($tel);
            } else {
                $telefone = new Telefone;
            $telefone->setNumero('1111-111' . $i)
                ->setTipo('telefone');

                $tel = $telefone;

                $manager->persist($tel);
            }

            $corretor = [
                'nome' => 'Corretor Teste ' . $i,
                'area' => 'Area Teste',
                'cargo' => 'Cargo Teste',
                'email' => 'teste' . $i . '@teste.com.br',
                'telefone' => $tel
            ];

            array_push($arrayCorretores, $corretor);
        }

        foreach(array_keys($arrayCorretores) as $key) {

            $corretor = new Corretor;

            $corretor->setNome($arrayCorretores[$key]['nome'])
                ->setArea($arrayCorretores[$key]['area'])
                ->setCargo($arrayCorretores[$key]['cargo'])
                ->setEmail($arrayCorretores[$key]['email'])
                ->addTelefone($arrayCorretores[$key]['telefone']);
                    
            $manager->persist($corretor);
        }
            
        
        $manager->flush();
        
    }

    public function getOrder() {
        return 1;
    }
}

*/