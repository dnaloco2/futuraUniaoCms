<?php

namespace CmsMediaForce\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use CmsMediaForce\Entity\Post;
use CmsMediaForce\Entity\DadosCadConteudo;

use CmsBase\Helper\SlugHelper;

/*
class LoadPost extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $faq = $manager->getReference('CmsMediaForce\Entity\Categoria',1);
        $glossario = $manager->getReference('CmsMediaForce\Entity\Categoria',2);
        $formulario = $manager->getReference('CmsMediaForce\Entity\Categoria',3);  
        $circular = $manager->getReference('CmsMediaForce\Entity\Categoria',4);
        $notificacao = $manager->getReference('CmsMediaForce\Entity\Categoria',5);        
        
        $fulanoCorretor = $manager->getReference('CmsMediaForce\Entity\User',2);

        $arthurAdmin = $manager->getReference('CmsMediaForce\Entity\User',3);

        $phpdate = mktime (0, 0, 0, date("m")+3, date("d"),  date("Y"));
        $expires = date( 'Y-m-d', strtotime( $phpdate ) );

        for ($i = 1; $i < 21; $i++) {
            $post = new Post;       

            $post->setTitulo('Uma Nova Pergunta ' . $i . '?')
                ->setConteudo('Lorem ratione, voluptatem, a delectus maxime rem rerum totam provident cum suscipit et enim mollitia.');

            $dadosCad = new DadosCadConteudo;

            $dadosCad->setSlug(SlugHelper::slug($post->getTitulo()))
                ->setCategoria($faq)
                ->setCriadoPor($fulanoCorretor);

            $manager->persist($dadosCad);

            $post->setDadosCad($dadosCad);
                    
            $manager->persist($post);
        }

        for ($i = 1; $i < 21; $i++) {
            $post = new Post;       

            $post->setTitulo('Termo  ' . $i)
                ->setConteudo('Lorem ratione, voluptatem, a delectus maxime rem rerum totam provident cum suscipit et enim mollitia.');

            $dadosCad = new DadosCadConteudo;

            $dadosCad->setSlug(SlugHelper::slug($post->getTitulo()))
                ->setCategoria($glossario)
                ->setCriadoPor($fulanoCorretor);

            $manager->persist($dadosCad);

            $post->setDadosCad($dadosCad);
                    
            $manager->persist($post);
        }

        for ($i = 1; $i < 21; $i++) {
            $post = new Post;       

            $post->setTitulo('Uma Nova Circular ' . $i)
                ->setConteudo('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus animi distinctio at aliquid placeat asperiores, voluptatibus, sequi minima. Blanditiis, nulla, debitis! Maiores repellendus magnam optio laborum nobis voluptas molestiae nulla dicta necessitatibus, unde vero praesentium, cum commodi voluptatem amet dignissimos libero officia soluta placeat. Perspiciatis eum vel, odio, debitis aut, nostrum deserunt, perferendis vitae id repellat esse at eligendi. Nihil dolores, deserunt aliquam veritatis consectetur laudantium corporis atque voluptates. Quibusdam est optio sint, architecto dolorum beatae tempora deserunt eligendi ipsam, dolores earum quae et alias neque. Ratione, voluptatem, a delectus maxime rem rerum totam provident cum suscipit et enim mollitia.');

            $dadosCad = new DadosCadConteudo;

            $dadosCad->setSlug(SlugHelper::slug($post->getTitulo()))
                ->setCategoria($circular)
                ->setCriadoPor($fulanoCorretor);

            $manager->persist($dadosCad);

            $post->setDadosCad($dadosCad);
                    
            $manager->persist($post);
        }

        for ($i = 1; $i < 21; $i++) {
            $post = new Post;       

            $post->setTitulo('Uma Nova Notificação ' . $i)
                ->setConteudo('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus animi distinctio at aliquid placeat asperiores, voluptatibus, sequi minima. Blanditiis, nulla, debitis! Maiores repellendus magnam optio laborum nobis voluptas molestiae nulla dicta necessitatibus, unde vero praesentium, cum commodi voluptatem amet dignissimos libero officia soluta placeat. Perspiciatis eum vel, odio, debitis aut, nostrum deserunt, perferendis vitae id repellat esse at eligendi. Nihil dolores, deserunt aliquam veritatis consectetur laudantium corporis atque voluptates. Quibusdam est optio sint, architecto dolorum beatae tempora deserunt eligendi ipsam, dolores earum quae et alias neque. Ratione, voluptatem, a delectus maxime rem rerum totam provident cum suscipit et enim mollitia.');

            $dadosCad = new DadosCadConteudo;

            $dadosCad->setSlug(SlugHelper::slug($post->getTitulo()))
                ->setCategoria($notificacao)
                ->setCriadoPor($fulanoCorretor);

            $manager->persist($dadosCad);

            $post->setDadosCad($dadosCad);
                    
            $manager->persist($post);
        }

        
        $manager->flush();
        
    }

    public function getOrder() {
        return 3;
    }
}

*/