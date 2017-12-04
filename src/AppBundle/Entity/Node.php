<?php

namespace AppBundle\Entity;

/**
 * Class Node
 * @package Iad\Bundle\ClubBusinessBundle\Entity
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="Iad\Bundle\ClubBusinessBundle\Repository\EventRepository")
 * @EventTitle(groups={"Default", "Event"})
 * @OpenTrainingPole(groups={"Default", "Event"})
 */
class Node
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;
    /**
     * @var string
     *
     * @ORM\Column(name="targeted_audience", type="json_array")
     */
    private $parents;

    /**
     * @var integer
     *
     * @ORM\Column(name="depth", type="integer")
     */
    private $depth;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set Url
     *
     * @param $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set parents
     *
     * @param string $parents
     *
     * @return Node
     */
    public function setParents($parents)
    {
        $this->parents = $parents;

        return $this;
    }

    /**
     * Get parents
     *
     * @return string
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     *
     * @return Node
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }
}
