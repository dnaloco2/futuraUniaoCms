<?php

namespace CmsMediaForce\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use CmsMediaForce\Entity\Link;


class LoadLink extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $arrayLinks = [
            'Susep' => 'www.susep.gov.br',
            'Fenacor' => 'www.fenacor.br',
            'Funenseg' => 'www.funenseg.org.br',
            'Associação Bras. de Gerência e Risco' => 'www.abgr.br',
            'I.R.B - Inst. de Resseguros do Brasil' => 'www.irbbrasilre.com',
            'Fenaseg' => 'www.fenaseg.org.br',
            'Sociedade Bras. de Ciências do Seguros' => 'www.cienciasdoseguro.org.br',
            'Assoc. Internacional de Direito de Seguros' => 'www.aida.org.br',
            // 'Media Force Site' => 'http://www.mediaforce.com.br/',
            // 'Sony Site' => 'http://www.sony.com.br/',
            // 'Apple Site' => 'http://www.apple.com/',
            // 'HP Site' => 'http://www8.hp.com/br/pt/home.html',
            // 'Philips Site' => 'http://www.philips.com.br/',
            // 'Canon Site' => 'http://www.canon.com.br/',
            // 'Mapfre Site' => 'http://www2.mapfre.com.br/home',
            // 'Bradesco Seguros Site' => 'http://www.bradescosaude.com.br/acessibilidade/home.do',
            // 'Zurich Seguros Site' => 'http://www.zurichseguros.com.br/',
            // 'Caixa Seguros Site' => 'http://www.caixaseguros.com.br/portal/site/CaixaSeguros',
            // 'Liberty Site' => 'http://www.libertyseguros.com.br/institucional/index.aspx',
            // 'Allianz Site' => 'http://www.allianz.com.br/',
            // 'Banco do Brasil Seguros Site' => 'http://www.bbseguros.com.br/alianca/index.html',
            // 'RSA Site' => 'http://www.rsagroup.com.br/',
            // 'SulAmerica Seguros Site' => 'http://portal.sulamericaseguros.com.br/home.htm',
            // 'Qbe Site' => 'http://www.qbe.com.br/WEB/index.asp',
            // 'Porto Seguro Site' => 'http://www.portoseguro.com.br/',
            // 'Azul Seguros Site' => 'http://www.azulseguros.com.br/',
            // 'Buscador Google' => 'https://www.google.com.br/',
            // 'Manual do PHP' => 'http://php.net/manual/pt_BR/',
            // 'Yahoo Site' => 'http://www.yahoo.com.br/',
            // 'Youtube Site' => 'http://www.youtube.com.br/',
            // 'Media Force Site' => 'http://www.mediaforce.com.br/',
            // 'Nerdcast | Jovem Nerd' => 'http://jovemnerd.com.br/categoria/nerdcast/',
        ];

        foreach(array_keys($arrayLinks) as $key){
            $link = new Link;       

            $link->setDescricao($key)
                ->setHref($arrayLinks[$key]);
                    
            $manager->persist($link);   
        }
            
        
        $manager->flush();
        
    }

    public function getOrder() {
        return 1;
    }
}
