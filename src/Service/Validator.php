<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 01/07/19
 * Time: 13:21
 */

namespace App\Service;

use App\Entity\News;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator
{
    public function news(ValidatorInterface $validator)
    {
        $author = new News();

        $errors = $validator->validate($author);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        return new Response('The author is valid! Yes!');
    }
}
