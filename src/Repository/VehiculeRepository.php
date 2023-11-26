<?php

namespace App\Repository;

use App\Entity\Vehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vehicule>
 *
 * @method Vehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicule[]    findAll()
 * @method Vehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicule::class);
    }
    
    public function rechercherVehicules($titre, $marque, $modele, $prixMax)
    {
        $queryBuilder = $this->createQueryBuilder('v');

        // Ajoutez des conditions à la requête en fonction des critères fournis
        if ($titre) {
            $queryBuilder->andWhere('v.titre LIKE :titre')
                         ->setParameter('titre', '%' . $titre . '%');
        }

        if ($marque) {
            $queryBuilder->andWhere('v.marque = :marque')
                         ->setParameter('marque', $marque);
        }

        if ($modele) {
            $queryBuilder->andWhere('v.modele LIKE :modele')
                         ->setParameter('modele', '%' . $modele . '%');
        }

        if ($prixMax) {
            $queryBuilder->andWhere('v.prix_journalier <= :prixMax')
                         ->setParameter('prixMax', $prixMax);
        }

        // Exécutez la requête et retournez les résultats
        return $queryBuilder->getQuery()->getResult();
    }

//    /**
//     * @return Vehicule[] Returns an array of Vehicule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vehicule
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
