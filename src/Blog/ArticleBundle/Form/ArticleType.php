<?php

namespace Blog\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("article_title", "text", array(
                "label" => "Article title"))
            ->add("article_text", "textarea", array(
                "label" => "Article content"))
            ->add("article_date", "datetime", array(
                "label" => "Publication date"))
            ->add("article_ispublished", "checkbox", array(
                "label" => "Publish an article"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Blog\ArticleBundle\Entity\Article'));
    }

    public function getName()
    {
        return 'article';
    }
}
