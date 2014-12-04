<?php

namespace CmsMediaForce\Entity;

use Doctrine\ORM\EntityRepository;

class ArquivoTextoRepository extends EntityRepository {
	public function findArrayByCategoria($categ_id) {

        $qb = $this->createQueryBuilder('p')
                   ->innerJoin('p.dadosCad', 'd')
                   ->where('d.categoria = :categoriaId')
                   ->setParameter('categoriaId', $categ_id);

        $arquivos = $qb->getQuery()->getResult();
        $a = array();

        foreach( $arquivos as $arquivo )
        {
            $dadosCad = $arquivo->getDadosCad()->toArray();

            $a[$arquivo->getId()]['id']            = $arquivo->getId();
            $a[$arquivo->getId()]['categoria']     = $dadosCad['categoria'];
            $a[$arquivo->getId()]['titulo']        = $arquivo->getTitulo();
            $a[$arquivo->getId()]['endereco']      = $arquivo->getEndereco();
            $a[$arquivo->getId()]['criado_em']     = $dadosCad['created_at'];
            $a[$arquivo->getId()]['atualizado_em'] = $dadosCad['updated_at'];
            $a[$arquivo->getId()]['criado_por']    = $dadosCad['criado_por'];
            $a[$arquivo->getId()]['expirar']       = $dadosCad['is_expired'];
            $a[$arquivo->getId()]['expiresAt']     = $dadosCad['expira_em'];
        }
        
        return $a;
    }
}
