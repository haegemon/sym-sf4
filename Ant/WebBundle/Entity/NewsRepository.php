<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nataliabernadskaya
 * Date: 26.07.14
 * Time: 18:57
 * To change this template use File | Settings | File Templates.
 */

namespace Ant\WebBundle\Entity;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NewsRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, News::class);
    }

    public function findAll(){
        return $this->findBy(array(), array('created'=>'DESC'));

    }

    public function findOther($id){
        $qb = $this->createQueryBuilder('n')
            ->andWhere('n.id != ?1')
            ->setParameter(1, $id)
            ->getQuery();

        return $qb->execute();
        }
}