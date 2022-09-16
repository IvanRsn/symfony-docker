<?php

declare(strict_types=1);

namespace App\Skills\Application\DTO;

use App\Skills\Domain\Entity\Skill\Skill;
use App\Skills\Domain\Entity\Skill\SkillGroup;

class SkillGroupDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $skills,
    ) {
    }

    public static function fromEntity(SkillGroup $skillGroup): self
    {
        return new self(
            id: $skillGroup->getId(),
            name: $skillGroup->getName(),
            skills: array_map(fn (Skill $skill) => SkillInfoDTO::fromEntity($skill),
                $skillGroup->getSkills()->toArray()),
        );
    }

    /**
     * @param SkillGroup[] $collection
     *
     * @return SkillGroupDTO[]
     */
    public static function fromEntityCollection(array $collection): array
    {
        return array_map(fn (SkillGroup $entity) => self::fromEntity($entity), $collection);
    }
}
