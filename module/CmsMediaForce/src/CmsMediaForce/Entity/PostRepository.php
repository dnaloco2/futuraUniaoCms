<?php

namespace CmsMediaForce\Entity;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository {

	public function findArray()
    {
        $posts = $this->findAll();
        $a = array();

        foreach( $posts as $post )
        {
        	$dadosCad = $post->getDadosCad()->toArray();

            $a[$post->getId()]['id'] 			= $post->getId();
            $a[$post->getId()]['categoria']		= $dadosCad['categoria'];
            $a[$post->getId()]['titulo'] 		= $post->getTitulo();
            $a[$post->getId()]['conteudo'] 		= $post->getConteudo();
            $a[$post->getId()]['criado_em'] 	= $dadosCad['created_at'];
            $a[$post->getId()]['atualizado_em'] = $dadosCad['updated_at'];
            $a[$post->getId()]['criado_por'] 	= $dadosCad['criado_por'];
            $a[$post->getId()]['expirar'] 		= $dadosCad['is_expired'];
            $a[$post->getId()]['expiresAt']  	= $dadosCad['expira_em'];
        }
        
        return $a;
    }

    public function findArrayByCategoria($categ_id)
    {

        $qb = $this->createQueryBuilder('p')
                   ->innerJoin('p.dadosCad', 'd')
                   ->where('d.categoria = :categoriaId')
                   ->setParameter('categoriaId', $categ_id);

        $posts = $qb->getQuery()->getResult();
        $a = array();

        foreach( $posts as $post )
        {
            $dadosCad = $post->getDadosCad()->toArray();

            $a[$post->getId()]['id']            = $post->getId();
            $a[$post->getId()]['categoria']     = $dadosCad['categoria'];
            $a[$post->getId()]['titulo']        = $post->getTitulo();
            $a[$post->getId()]['conteudo']      = $post->getConteudo();
            $a[$post->getId()]['criado_em']     = $dadosCad['created_at'];
            $a[$post->getId()]['atualizado_em'] = $dadosCad['updated_at'];
            $a[$post->getId()]['criado_por']    = $dadosCad['criado_por'];
            $a[$post->getId()]['expirar']       = $dadosCad['is_expired'];
            $a[$post->getId()]['expiresAt']     = $dadosCad['expira_em'];
        }
        
        return $a;
    }
}
