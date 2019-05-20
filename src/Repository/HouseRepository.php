<?php


namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class HouseRepository extends EntityRepository
{
    public function selectOther(int $selectedId, int $limit)
    {
        $qb = $this->createQueryBuilder('h');
        $qb->where('h.id != :identifier')
            ->setParameter('identifier', $selectedId)
            ->orderBy('h.id', 'DESC')
            ->setMaxResults($limit);

        return $qb->getQuery()
            ->getResult();
    }
}
