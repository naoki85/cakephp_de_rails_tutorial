<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setDisplayField('email');
        $this->setDisplayField('password');
        $this->setDisplayField('password_confirmation');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->scalar('name')
            ->requirePresence('name')
            ->notEmpty('name')
            ->add('name', [
                'length' => [
                    'rule' => ['maxLength', 50],
                    'message' => 'Name need to be at most 50 characters long',
                ]
            ]);

        $validator
            ->email('email')
            ->requirePresence('email')
            ->notEmpty('email')
            ->add('email', [
                'length' => [
                    'rule' => ['maxLength', 255],
                    'message' => 'Email need to be at most 255 characters long',
                ]
            ])
            ->add('email', 'custom', [
                'rule' => [$this, 'validateMailFormat'],
                'message' => 'Invalid mail format'
            ]);
            
        $validator
            ->scalar('password')
            ->requirePresence('password')
            ->notEmpty('password')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'Email need to be at least 6 characters long',
                ]
            ]);
            
        $validator
            ->add('password_confirmation', [
                'compare' => [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Not correct password',
                ]
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
    
    public function beforeSave($event, $entity, $options)
    {
        $hasher = new DefaultPasswordHasher();
        $entity->password_digest = $hasher->hash($entity->password);
        
        $entity->email = mb_strtolower($entity->email);
        
        return;
    }
    
    public static function validateMailFormat($value)
    {
        return (bool) preg_match("/\A[\w+\-.]+@[a-z\d\-.]+\.[a-z]+\z/i", $value);
    }
}
