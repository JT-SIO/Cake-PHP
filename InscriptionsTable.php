<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inscriptions Model
 *
 * @property \App\Model\Table\ForfaitTable&\Cake\ORM\Association\BelongsTo $Forfait
 * @property \App\Model\Table\MachineTable&\Cake\ORM\Association\BelongsTo $Machine
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Inscription newEmptyEntity()
 * @method \App\Model\Entity\Inscription newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Inscription> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inscription get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Inscription findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Inscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Inscription> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inscription|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Inscription saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Inscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscription>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscription> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscription>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscription>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscription> deleteManyOrFail(iterable $entities, array $options = [])
 */
class InscriptionsTable extends Table
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

        $this->setTable('inscriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Forfait', [
            'foreignKey' => 'forfait_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Machine', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->dateTime('dateDebut')
            ->notEmptyDateTime('dateDebut');

        $validator
            ->dateTime('dateFin')
            ->notEmptyDateTime('dateFin');

        $validator
            ->integer('forfait_id')
            ->notEmptyString('forfait_id');

        $validator
            ->integer('machine_id')
            ->notEmptyString('machine_id');

        $validator
            ->uuid('user_id')
            ->notEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['forfait_id'], 'Forfait'), ['errorField' => 'forfait_id']);
        $rules->add($rules->existsIn(['machine_id'], 'Machine'), ['errorField' => 'machine_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
