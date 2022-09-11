<?php

declare(strict_types=1);

namespace App\Testing\Infrastructure\Repository;

use App\Testing\Domain\Entity\Test\Question;
use App\Testing\Domain\Repository\QuestionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class QuestionRepository extends ServiceEntityRepository implements QuestionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function findOneById(string $id): ?Question
    {
        return $this->find($id);
    }
}