<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machine Model
 *
 * @property \App\Model\Table\AssociationTable&\Cake\ORM\Association\HasOne $Association
 * @property \App\Model\Table\InscriptionsTable&\Cake\ORM\Association\HasMany $Inscriptions
 *
 * @method \App\Model\Entity\Machine newEmptyEntity()
 * @method \App\Model\Entity\Machine newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Machine> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machine get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Machine findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Machine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Machine> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machine|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Machine saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MachineTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('machine');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasOne('Association', [
            'foreignKey' => 'machine_id',
        ]);
        $this->hasMany('Inscriptions', [
            'foreignKey' => 'machine_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nom')
            ->maxLength('nom', 50)
            ->allowEmptyString('nom');

        $validator
            ->scalar('Etat')
            ->allowEmptyString('Etat');

        $validator
            ->scalar('memoire')
            ->allowEmptyString('memoire');

        $validator
            ->scalar('OS')
            ->allowEmptyString('OS');

        $validator
            ->scalar('processeur')
            ->allowEmptyString('processeur');

        return $validator;
    }
}
