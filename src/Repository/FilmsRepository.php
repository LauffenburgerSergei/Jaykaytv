<?php

namespace App\Repository;

use App\Entity\Films;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Films|null find($id, $lockMode = null, $lockVersion = null)
 * @method Films|null findOneBy(array $criteria, array $orderBy = null)
 * @method Films[]    findAll()
 * @method Films[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Films::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Films $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Films $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * Undocumented function
    //  *
    //  * @param [type] $value
    //  * @return void
    //  */
    // public function findAllFilms(Films $entity)
    // {
    //     return $this->findAll();
    // }
    /**
     * @return Films[] Returns an array of Films objects
     */
    
    // public function findByExampleField($value)
    // {
    //     return $this->createQueryBuilder('f')
    //         ->andWhere('f.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('f.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    

    /*
    public function findOneBySomeField($value): ?Films
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAll()
{
    return $this->findBy(
    array(),
    array('annee' => 'ASC',
          'titre' => 'ASC')
    );
}
   /**
    * trouve un element par son id
    *
    * @param integer $id
    * @return array
    */
public function findOneById(int $id)
    {
        $qb = $this->createQueryBuilder('f')
            // ->innerJoin('Genre')
            ->where('f.id = :id')
            ->setParameter('id', $id);

        $query = $qb->getQuery();

        return $query->setMaxResults(1)->getOneOrNullResult();
    }

}
