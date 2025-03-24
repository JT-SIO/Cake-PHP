<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forfait Model
 *
 * @property \App\Model\Table\InscriptionsTable&\Cake\ORM\Association\HasMany $Inscriptions
 *
 * @method \App\Model\Entity\Forfait newEmptyEntity()
 * @method \App\Model\Entity\Forfait newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Forfait> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forfait get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Forfait findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Forfait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Forfait> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forfait|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Forfait saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Forfait>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Forfait>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Forfait>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Forfait> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Forfait>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Forfait>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Forfait>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Forfait> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ForfaitTable extends Table
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

        $this->setTable('forfait');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Inscriptions', [
            'foreignKey' => 'forfait_id',
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
            ->decimal('prix')
            ->allowEmptyString('prix');

        return $validator;
    }
}
