<?php


namespace actor;

/**
 * Class ActorDirector
 * @package actor
 */
final class ActorDirector
{
    /**
     * @param IActorBuilder $builder
     * @return IActor
     */
    public function build(IActorBuilder $builder): IActor
    {
        $builder->createActor();
        $builder->addGraphic();
        $builder->addSkills();
        $builder->addInfo();

        return $builder->getActor();
    }
}