<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 06/06/19
 * Time: 11:12
 */

namespace App;

use PHPStan\Testing\TestCase;
use App\Entity\QCMAnswers;
use Symfony\Bridge\Doctrine\Form\ChoiceList\ORMQueryBuilderLoader;



class QcmTest extends TestCase
{


    public function isWinning()
    {
        $query = $this->createQuery()
        $QueryBuilder
            ->selectMax()
            ->from('SdzBlogBundle:Article', 'a');
        $answer = new QCMAnswers();

        $isWinning = '';
        if ($answer[$good_answer] == 1) {
            $isWinning = 'Bravo !';
        } else {
            $isWinning = 'Ce n\'est pas la bonne réponse..';
        }
    }
}