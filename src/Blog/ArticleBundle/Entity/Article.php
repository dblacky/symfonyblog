<?php

namespace Blog\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 * @ORM\Entity()
 * @ORM\Table(name="articles")
 */
class Article
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $article_title;

    /**
     * @ORM\Column(type="text")
     */
    protected $article_text;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $article_date;

    /**
     * @ORM\Column(type="boolean", )
     */
    protected $article_ispublished = true;


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
     * Set articleTitle
     *
     * @param string $articleTitle
     *
     * @return Article
     */
    public function setArticleTitle($articleTitle)
    {
        $this->article_title = $articleTitle;

        return $this;
    }

    /**
     * Get articleTitle
     *
     * @return string
     */
    public function getArticleTitle()
    {
        return $this->article_title;
    }

    /**
     * Set articleText
     *
     * @param string $articleText
     *
     * @return Article
     */
    public function setArticleText($articleText)
    {
        $this->article_text = $articleText;

        return $this;
    }

    /**
     * Get articleText
     *
     * @return string
     */
    public function getArticleText()
    {
        return $this->article_text;
    }

    /**
     * Set articleDate
     *
     * @param \DateTime $articleDate
     *
     * @return Article
     */
    public function setArticleDate($articleDate)
    {
        $this->article_date = $articleDate;

        return $this;
    }

    /**
     * Get articleDate
     *
     * @return \DateTime
     */
    public function getArticleDate()
    {
        return $this->article_date;
    }

    /**
     * Set articleIspublished
     *
     * @param boolean $articleIspublished
     *
     * @return Article
     */
    public function setArticleIspublished($articleIspublished)
    {
        $this->article_ispublished = $articleIspublished;

        return $this;
    }

    /**
     * Get articleIspublished
     *
     * @return boolean
     */
    public function getArticleIspublished()
    {
        return $this->article_ispublished;
    }
}
