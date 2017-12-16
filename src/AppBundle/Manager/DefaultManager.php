<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DefaultManager
 */
class DefaultManager
{

    /**
     * @var EntityManagerInterface $entityManager
     */
    protected $entityManager;

    /**
     * Retourne le nom complet de la classe gérée par le manager
     *
     * @return string
     */
    abstract public function getClass();

    /**
     * Retourne le repository doctrine de l'entité
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->entityManager->getRepository($this->getClass());
    }

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getManager()
    {
        return $this->entityManager;
    }

    /**
     * @param string $filterName
     */
    public function disableFilter($filterName)
    {
        $this->entityManager->getFilters()->disable($filterName);
    }

    /**
     * @param string $filterName
     */
    public function enableFilter($filterName)
    {
        $this->entityManager->getFilters()->enable($filterName);
    }

    /**
     * Vérifie que l'entity est bien gérée par le manager
     *
     * @param object $entity
     * @return bool
     */
    public function supports($entity)
    {
        $className = $this->getClass();

        return $entity instanceof $className;
    }

    /**
     * Instancie l'entité
     *
     * @return mixed
     */
    public function create()
    {
        $className = $this->getClass();

        return new $className();
    }

    /**
     * Cherche une entité par se clef primaire
     *
     * @param mixed $id
     * @return object
     */
    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @param array    $where
     * @param array    $orderBy
     * @param null|int $limit
     * @param int      $offset
     * @return mixed
     */
    public function findBy(array $where, array $orderBy = [], $limit = null, $offset = 0)
    {
        return $this->getRepository()->findBy($where, $orderBy, $limit, $offset);
    }

    /**
     * @param array      $where
     * @param array|null $orderBy
     * @return null|object
     */
    public function findOneBy(array $where, array $orderBy = null)
    {
        return $this->getRepository()->findOneBy($where, $orderBy);
    }

    /**
     * Find all entries
     *
     * @return array
     */
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    /**
     * Persist une entité, avec ou sans flush
     *
     * @param object $entity
     * @param bool   $flush
     * @return $this
     * @throws UnsupportedObjectException
     */
    public function persist($entity, $flush = false)
    {
        if (!$this->supports($entity)) {
            throw new UnsupportedObjectException($entity, $this->getClass());
        }

        $this->entityManager->persist($entity);

        if ($flush) {
            $this->flush();
        }

        return $this;
    }

    /**
     * Refresh une entité
     *
     * @param object $entity
     * @return $this
     * @throws UnsupportedObjectException
     */
    public function refresh($entity)
    {
        if (!$this->supports($entity)) {
            throw new UnsupportedObjectException($entity, $this->getClass());
        }

        $this->entityManager->refresh($entity);

        return $this;
    }

    /**
     * Flush du manager
     *
     * @return null
     */
    public function flush()
    {
        $this->entityManager->flush();

        return $this;
    }

    /**
     * Remove une entité, avec ou sans flush
     *
     * @param object $entity
     * @param bool   $flush
     *
     * @return null
     * @throws UnsupportedObjectException
     */
    public function remove($entity, $flush = false)
    {
        if (!$this->supports($entity)) {
            throw new UnsupportedObjectException($entity, $this->getClass());
        }

        $this->entityManager->remove($entity);

        if ($flush) {
            $this->flush();
        }

        return $this;
    }
}
