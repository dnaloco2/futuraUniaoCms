<?php

namespace CmsMediaForce\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use CmsMediaForce\Entity\ArquivoTexto,
    CmsMediaForce\Entity\DadosCadConteudo;

use CmsBase\Helper\SlugHelper;
/*
class LoadArquivoTexto extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $dirFormularios = 'public/arquivos/formularios/';

        $endereco = 'arquivos/formularios/';

        $scanDir = scandir($dirFormularios);

        $notToRead = array(
          '.',
          '..',
          '_'
        );

        foreach($scanDir as $file) {
            if (!in_array($file, $notToRead)) {
                $endereco = $endereco . $file;

                $ext = pathinfo($file, PATHINFO_EXTENSION);

                $titulo = basename($file, ".".$ext);

                $arquivo = new ArquivoTexto;

                $arquivo->setTitulo($titulo)
                    ->setEndereco($endereco);

                $formulario = $manager->getReference('CmsMediaForce\Entity\Categoria', 3);

                $arthurAdmin = $manager->getReference('CmsMediaForce\Entity\User', 4);        

                $dadosCad = new DadosCadConteudo;

                $dadosCad->setSlug(SlugHelper::slug($arquivo->getTitulo()))
                    ->setCategoria($formulario)
                    ->setCriadoPor($arthurAdmin);

                $manager->persist($dadosCad);

                $arquivo->setDadosCad($dadosCad);

                $manager->persist($arquivo);

            }
        }

        $dirFormularios = 'public/arquivos/circulares/';

        $endereco = 'arquivos/circulares/';

        $scanDir = scandir($dirFormularios);

        foreach($scanDir as $file) {
            if (!in_array($file, $notToRead)) {
                $endereco = $endereco . $file;

                $ext = pathinfo($file, PATHINFO_EXTENSION);

                $titulo = basename($file, ".".$ext);

                $arquivo = new ArquivoTexto;

                $arquivo->setTitulo($titulo)
                    ->setEndereco($endereco);

                $circular = $manager->getReference('CmsMediaForce\Entity\Categoria', 4);

                $arthurAdmin = $manager->getReference('CmsMediaForce\Entity\User', 4);        

                $dadosCad = new DadosCadConteudo;

                $dadosCad->setSlug(SlugHelper::slug($arquivo->getTitulo()))
                    ->setCategoria($circular)
                    ->setCriadoPor($arthurAdmin);

                $manager->persist($dadosCad);

                $arquivo->setDadosCad($dadosCad);

                $manager->persist($arquivo);

            }
        }

        $manager->flush();     
    }

    public function getOrder() {
        return 3;
    }
}

*/