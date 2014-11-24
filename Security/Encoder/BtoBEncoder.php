<?php

namespace BtoB\SocialNetwork\CoreBundle\Security\Encoder;

/**
 * Encoder del password de BtoB
 *
 * @author Carlos Mendoza <inhak20@tecnocreaciones.com>
 */
class BtoBEncoder implements \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface {
    public function encodePassword($raw, $salt) {
        return md5($raw);
    }

    public function isPasswordValid($encoded, $raw, $salt) {
        return $encoded == md5($raw);
    }
}
