<?php

namespace Doctrine\ODM\PHPCR\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * This class represents an arbitrary node
 *
 * It is used as a default document, for example with the ParentDocument annotation.
 * You can not use this to create nodes as it has no type annotation.
 *
 * @PHPCRODM\Document()
 */
class Generic
{
    /** @PHPCRODM\Id */
    protected $id;

    /** @PHPCRODM\Node */
    protected $node;

    /** @PHPCRODM\Nodename */
    protected $nodename;

    /** @PHPCRODM\ParentDocument */
    protected $parent;

    /** @PHPCRODM\Children */
    protected $children;

    /** @PHPCRODM\Referrers */
    protected $referrers;

    /**
     * Id (path) of this document
     *
     * @return string the id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * The node name of the file.
     *
     * @return string
     */
    public function getNodename()
    {
        return $this->nodename;
    }

    /**
     * Set the node name of the file. (only mutable on new document before the persist)
     *
     * @param string $name the name of the file
     */
    public function setNodename($name)
    {
        $this->nodename = $name;
    }

    /**
     * The parent Folder document of this document.
     *
     * @param object $parent Folder document that is the parent of this node.
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent document of this document. Only mutable on new document
     * before the persist.
     *
     * @param object $parent Document that is the parent of this node. Must be
     *      a Folder or otherwise resolve to nt:folder
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * The children documents of this document
     *
     * If there is information on the document type, the documents are of the
     * specified type, otherwise they will be Generic documents
     *
     * @return object documents
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Sets the children
     *
     * @param $children ArrayCollection
     */
    public function setChildren(ArrayCollection $children)
    {
        $this->children = $children;
    }

    /**
     * Add a child to this document
     *
     * @param $child
     */
    public function addChild($child)
    {
        if (null === $this->children) {
            $this->children = new ArrayCollection();
        }

        $this->children->add($child);
    }

    /**
     * The documents having a reference to this document
     *
     * If there is information on the document type, the documents are of the
     * specified type, otherwise they will be Generic documents
     *
     * @return string
     */
    public function getReferrers()
    {
        return $this->referrers;
    }

    /**
     * Sets the referrers
     *
     * @param $referrers ArrayCollection
     */
    public function setReferrers(ArrayCollection $referrers)
    {
        $this->referrers = $referrers;
    }

    /**
     * Add a referrer to this document
     *
     * @param $referrer
     */
    public function addReferrer($referrer)
    {
        if (null === $this->referrers) {
            $this->referrers = new ArrayCollection();
        }

        $this->referrers->add($referrer);
    }
    
    /**
     * The node of this document
     *
     * @return object node
     */
    public function getNode() {
        return $this->node;
    }
}
