<?php

namespace Fly\UserBundle\Form\DataTransformer;

use Fly\UserBundle\Entity\Invitation;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;


class InvitationToEmailTransformer implements DataTransformerInterface
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Invitation) {
            throw new UnexpectedTypeException($value, 'Fly\UserBundle\Entity\Invitation');
        }

        return $value->getEmail();
    }

    public function reverseTransform($value)
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }
//        var_dump('OK');die;
        return $this->entityManager
            ->getRepository('Fly\UserBundle\Entity\Invitation')
            ->findOneBy(array(
                'email' => $value,
//                'user' => null,
            ));
    }
}