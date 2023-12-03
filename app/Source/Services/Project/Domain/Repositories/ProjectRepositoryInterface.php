<?php

namespace App\Source\Services\Project\Domain\Repositories;

interface ProjectRepositoryInterface
{
    /**
     * Saves a new project or updates an existing one in the repository.
     *
     * @param Project $project
     * @return void
     */
    public function save(Project $project): void;

    /**
     * Finds a project by its ID.
     *
     * @param string $projectId
     * @return Project|null
     */
    public function findById(string $projectId): ?Project;

    /**
     * Deletes a project by its ID.
     *
     * @param string $projectId
     * @return void
     */
    public function deleteById(string $projectId): void;

    /**
     * Retrieves all projects.
     *
     * @return Project[]
     */
    public function findAll(): array;
}
